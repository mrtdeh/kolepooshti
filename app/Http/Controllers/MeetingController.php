<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meeting;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;

class MeetingController extends Controller
{
    


    public function check()
    {
        // return redirect("/")->with('message', "گذرواژه شما با موفقیت تغییر یافت.");
     
        try{


            $credentials = request()->only('username', 'password');

            if ( Auth::attempt($credentials)) {

                $user = Auth::user();

                // Reset password if user profile updated  date is no longer than 15 day
                $userDate = $user->updated_at;
                $now = now();
                if(empty( $userDate) || $now->diff($userDate)->days > 15){

                    session(['user'=> $user->id]);
                    return redirect("/reset-password");
                }
                // if($userDate 

        
                if (in_array($user->type ,["admin" ,"dev","deputy"])) return redirect("/panel");

            
                return $this->bbb_enter( $user );
                
            }else{

                return back()->withErrors([
                    'username' => 'نام کاربری و گذرواژه اشتباه است',
                ]);
            }
        }catch(Exeption $e){

            return back();
        }
        
    }


    public function list()
    {
        return view("pages.loginMeetingList",request()->all());
    }



    public function select(Request $req)
    {

        $ccs_id = $req->ccs;

        

        $meeting_name =  $req->mn;

        $user = User::find($req->uid);

        return $this->enterSpecify( $user  , $ccs_id, $meeting_name);
        

        return "Selcted meeting not found";
    }


//=========================================================================================


    private function enterSpecify( $user , $ccs_id , $meeting_name )
    {
        
        $meeting_id = 0;

        $meeting = Meeting::where("ccs_id","=",$ccs_id)
        ->orderBy('id', 'desc')
        ->first();
        // dd($meeting);
        

        if(!empty($meeting)){
            $meeting_id = $meeting->meeting_code;
            // dd($meeting);
        }
        
        if (empty($meeting_id)){

            $meeting_id = rand(1000000000,9999999999);
            Meeting::create([
                "ccs_id" =>  $ccs_id,
                "meeting_code" => $meeting_id,
                
            ]);
        }



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
                    'userID' => $user->id,
                    'password' => 'attendeepw' 
                ])
            );

        }
        else {
            
            
            return redirect()->to(
                Bigbluebutton::join([
                    'meetingID' => $meeting_id,
                    'userName' => $user->fullName,
                    'userID' => $user->id,
                    'password' => 'moderatorpw' 
                ])
            );
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
        $userType = $user->type;
        // Fetch All course Times for this User
        $rooms = $user->rooms()->get();

        $room_checkout = [];

        foreach ($rooms as $key => $room) {

            if (in_array($room->id ,   $room_checkout)) continue;

            array_push( $room_checkout , $room->id );

            $room = ClassRoom::with("schedules")->find($room->id);
            
            $schedules = $room->schedules;
            // Fetch Meeting Times in this Time
            foreach ($schedules as $i => $s) {

                
                // echo "schedule $i = " . $s->id . "<br>";

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


                    if(!empty($ccs)){

                        $ccs_id = $ccs->id;
                        $meetingName =  $room->name. ' - ' . $s->course()->name;

                        array_push($target_schedules , [
                            "ccs_id" => $ccs_id,
                            "meetingName" => $meetingName,
                        ]);
                    }

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


            return $this->enterSpecify( $user , $ccs_id, $meetingName);
        

        }



        return "meeting not found in this time";
    }


}
