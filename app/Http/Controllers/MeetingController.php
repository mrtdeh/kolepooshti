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

        $user = User::find($req->uid);
// dd($meeting);

        if (empty($meeting)){
            $meeting_id = rand(10000000,999999999);
            Meeting::create([
                "ccs_id" =>  $ccs_id,
                "meeting_code" => $meeting_id,
                
            ]);
        }else {
            $meeting_id = $meeting->meeting_code;
        }

        return redirect()->to(
            Bigbluebutton::start([
                    
                'meetingID' =>  $meeting_id,
                'meetingName' =>  $req->mn,
                'attendeePW' => 'attendeepw',
                'moderatorPW' => 'moderatorpw',
                'userName' => $user->fullName
            ])
        );

        return "sdf";
    }


//=========================================================================================

    
    // public function nextMeetingInfo()
    // {
        
    //     $target_schedules = [];
    //     $next_schedule = "";
    //     $user = auth()->user();
    //     $userType = $user->type;
    //     // Fetch All course Times for this User
    //     $rooms = $user->rooms()->get();
        
        
    //     // dd($rooms);
    //     foreach ($rooms as $key => $room) {
            
           
    //         $room = ClassRoom::with("schedules")->find($room->id);
            

    //         $schedules = $room->schedules;
             
    //         // Fetch Meeting Times in this Time
    //         foreach ($schedules as $i => $s) {


    //             $a = strtotime($s->start);
    //             $b = strtotime($s->end);
    //             $nowTime  = time();

    //             // Check if time is now
    //             $is_at_this_time = $nowTime >= $a && $nowTime < $b;

    //             $is_at_next_time = $nowTime < $a && $nowTime < $b;

                

    //             // Check if today
    //             $dayNumber = jdate('today')->toArray()["dayOfWeek"];
    //             // echo $dayNumber;
    //             $is_at_this_day = $dayNumber  == $s->day;

    //             // dd(jdate('W')->addDays(5)->getTimestamp()%2==1);
    //             // echo $is_at_this_day;
    //             if ($is_at_this_day && $is_at_this_time){
                
    //                 array_push($target_schedules , $s);

                    
    //             }

    //             if ($is_at_next_time){
    //                 // if( $next_schedule )
    //                 $next_schedule = $s;
    //             }
    //         }
    //     }
        
    //     return count($target_schedules) ? $target_schedules : $next_schedule;

    // }






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
            //   print( $s->start);
            //   print( $s->end);
            //   echo "a = "  .jdate($a )->format("h:M");
            //     echo "<br>time = " . ($is_at_this_time ? "1":"0");

                // $is_at_next_time = $nowTime < $a && $nowTime < $b;

                

                // Check if today
                $dayNumber = jdate('today')->toArray()["dayOfWeek"];
                // echo $dayNumber;
                $is_at_this_day = $dayNumber  == $s->day;
                // echo "<br>day = " . $is_at_this_day."<br>";
                // dd(jdate('W')->addDays(5)->getTimestamp()%2==1);
  
                if ($is_at_this_day && $is_at_this_time){
                // dd("DDDDDDDDD");
                    
                    
                    if ($userType == "teacher"){
                        $ccs_id = DB::table("class_course_schedule")
                        ->where([
                            ["class_id","=",$room->id],
                            ["teacher_id","=",$user->id],
                            ["schedule_id","=",$s->id]])->first();
                            
                        if(!empty($ccs_id)){
                            $ccs_id = $ccs_id->id;
                        }
                    }
                    else{
                        $ccs_id = DB::table("class_course_schedule")
                        ->where([
                            ["class_id","=",$room->id],
                            ["schedule_id","=",$s->id]])->first()->id;   
                    }

                    $meetingName =  $room->name. ' - ' . $s->course()->name;

                    if(!empty($ccs_id))
                        array_push($target_schedules , [
                            "ccs_id" => $ccs_id,
                            "meetingName" => $meetingName,
                        ]);
                
                }

              
            }

            $ccs_id = null;

            // if(!empty($ccs_id))break;
            
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


        // Check user as Student or Teacher to join in room


            if (empty($meeting_id)){

                $meeting_id = rand(10000000,999999999);
                Meeting::create([
                    "ccs_id" =>  $ccs_id,
                    "meeting_code" => $meeting_id,
                    
                ]);
            }

            $password = $userType == "student" ? "attendeepw" : "moderatorpw";

            // return redirect()->to(
            Bigbluebutton::create([
            
                'meetingID' => $meeting_id,
                'meetingName' =>  $meetingName,
                'attendeePW' => 'attendeepw',
                'moderatorPW' => 'moderatorpw',
                'userName' => $user->fullName
            ]);
                    // );
                // }
            // }

           

            if ( $userType == "student" ){

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



        return "meeting not found in this time";
    }


}
