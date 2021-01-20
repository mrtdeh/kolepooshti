<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meeting;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;

class MeetingController extends Controller
{
    


    public function check()
    {

     


        $credentials = request()->only('username', 'password');

        if ( Auth::attempt($credentials)) {

            $user = Auth::user();

    
            if ($user->type == "admin") return redirect("/panel");

        
            return $this->bbb_enter( $user );
            
        }else{

            return back()->withErrors([
                'username' => 'نام کاربری و گذرواژه اشتباه است',
            ]);
        }
    }


    public function list()
    {
        return view("pages.loginMeetingList",request()->all());
    }



    public function select(Request $req)
    {

        $ccs_id = $req->ccs;

        $meeting = Meeting::where("ccs_id","=",$ccs_id)
        ->orderBy('id', 'desc')
        ->first();
        // dd($meeting);
        

        if(!empty($meeting)){
            $meeting_id = $meeting->meeting_code;
            // dd($meeting);
        }

        $meeting_name =  $req->mn;

        $user = User::find($req->uid);

        return $this->enter( $user  , $meeting_id, $meeting_name);
        

        return "Selcted meeting not found";
    }


//=========================================================================================


    private function enter( $user , $meeting_id , $meeting_name )
    {
        
        if(!empty($meeting_id)){



            Bigbluebutton::create([
            
                'meetingID' => $meeting_id,
                'meetingName' =>  $meeting_name,
                'attendeePW' => 'attendeepw',
                'moderatorPW' => 'moderatorpw',
                'userName' => $user->fullName
            ]);
    

            if ( $user->type == "student" ){

                // dd($meeting_id);
                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $meeting_id,
                        'userName' => $user->fullName,
                        'password' => 'attendeepw' 
                    ])
                );

            }
            else {
                
                
                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $meeting_id,
                        'userName' => $user->fullName,
                        'password' => 'moderatorpw' 
                    ])
                );
            }
        }

        return "Selected meeting id not valid";
        
    }
    
    


    private function bbb_enter( $user )
    {   
        
        $target_schedules = [];
        $meeting_id = "";
        $meetingName = "";
        $ccs_id = 0;
        $next_schedule = "";
        // $user = auth()->user();
        $userType = $user->type;
        // Fetch All course Times for this User
        $rooms = $user->rooms()->get();
        // dd(  $user->id);
      
        foreach ($rooms as $key => $room) {

            // dd($room->schedules);
            // echo "room $key = " . $room->id. "<br>";
            $room = ClassRoom::with("schedules")->find($room->id);
           
            // if($room->id != 1)
            // dd($room );
            
            $schedules = $room->schedules;
            
            
            // Fetch Meeting Times in this Time
            foreach ($schedules as $i => $s) {

                
                echo "schedule $i = " . $s->id . "<br>";

                $a = strtotime($s->start);
                $b = strtotime($s->end);
                $nowTime  = time();
                // Check if time is now
                $is_at_this_time = $nowTime >= $a && $nowTime < $b;
                // Check if today
                $dayNumber = jdate('today')->toArray()["dayOfWeek"];
                $is_at_this_day = $dayNumber  == $s->day;
  



                if ($is_at_this_day && $is_at_this_time){

                    $ccs = null;
                    if ($userType == "teacher"){
                        $ccs = DB::table("class_course_schedule")
                        ->where([
                            ["class_id","=",$room->id],
                            ["teacher_id","=",$user->id],
                            ["schedule_id","=",$s->id]])->first();
                            
                    }
                    else{
                        $ccs = DB::table("class_course_schedule")
                        ->where([
                            ["class_id","=",$room->id],
                            ["schedule_id","=",$s->id]])->first();      
                    }


                    if(!empty($ccs))
                        $ccs_id = $ccs->id;

                   
                    $meetingName =  $room->name. ' - ' . $s->course()->name;


                    if(!empty($ccs))
                        array_push($target_schedules , [
                            "ccs_id" => $ccs_id,
                            "meetingName" => $meetingName,
                        ]);



                
                }
            }
        }





        if (!empty($target_schedules)){

            if(count($target_schedules) > 1){

                return view("pages.loginMeetingList",compact("target_schedules","user"));
            }
            

            // dd($meetingName);
            $meeting = Meeting::where("ccs_id","=",$ccs_id)
            ->orderBy('id', 'desc')
            ->first();
            // dd($meeting);
            

            if(!empty($meeting)){
                $meeting_id = $meeting->meeting_code;
                // dd($meeting);
            }

            dd($meeting_id);

            if (empty($meeting_id)){

                $meeting_id = rand(10000000,999999999);
                Meeting::create([
                    "ccs_id" =>  $ccs_id,
                    "meeting_code" => $meeting_id,
                    
                ]);
            }


            return $this->enter( $user , $meeting_id, $meetingName);
        

        }



        return "meeting not found in this time";
    }


}
