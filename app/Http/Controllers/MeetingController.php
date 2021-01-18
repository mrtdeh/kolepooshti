<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meeting;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;

class MeetingController extends Controller
{
    


    public function check()
    {


        //  return redirect()->to(
        //             Bigbluebutton::join([
        //                 'meetingID' => "sdfsdfsdfsdf",
        //                 // 'callbackURL' => "https://webhook.site/625f4cf7-2e55-4803-98a3-e92f2d65c72b",
        //                 'userName' => "123123",
        //                 // 'moderatorPW' => 'moderatorpwd', //moderator password set here
        //                 'password' => 'attendeepwd',
        //             ])
        //         );

        $user = User::where( "username" , request()->username )->first();
        // dd($user);
        if (!empty($user)){
            
            auth()->login($user);

    
            if ($user->type == "admin") return redirect("/panel");

        
            return $this->bbb_enter( $user );
            
        }else{

            dd("username or pass is worng");
        }
    }


//=========================================================================================

    
    public function nextMeetingInfo()
    {
        
        $target_schedules = [];
        $next_schedule = "";
        $user = auth()->user();
        $userType = $user->type;
        // Fetch All course Times for this User
        $rooms = $user->rooms()->get();
        
        
        // dd($room);
        foreach ($rooms as $key => $room) {
            
           
            $room = ClassRoom::with("schedules")->find($room->id);
            

            $schedules = $room->schedules;
             
            // Fetch Meeting Times in this Time
            foreach ($schedules as $i => $s) {


                $a = strtotime($s->start);
                $b = strtotime($s->end);
                $nowTime  = time();

                // Check if time is now
                $is_at_this_time = $nowTime >= $a && $nowTime < $b;

                $is_at_next_time = $nowTime < $a && $nowTime < $b;

                

                // Check if today
                $dayNumber = jdate('today')->toArray()["dayOfWeek"];
                // echo $dayNumber;
                $is_at_this_day = $dayNumber  == $s->day;

                // dd(jdate('W')->addDays(5)->getTimestamp()%2==1);
                // echo $is_at_this_day;
                if ($is_at_this_day && $is_at_this_time){
                
                    array_push($target_schedules , $s);

                    
                }

                if ($is_at_next_time){
                    // if( $next_schedule )
                    $next_schedule = $s;
                }
            }
        }
        
        return count($target_schedules) ? $target_schedules : $next_schedule;

    }






    private function bbb_enter( $user )
    {   
        
        $target_schedules = [];
        $meeting_id = "";
        $ccs_id = 0;
        $next_schedule = "";
        // $user = auth()->user();
        $userType = $user->type;
        // Fetch All course Times for this User
        $rooms = $user->rooms()->get();
        
        
        // dd($rooms);
        foreach ($rooms as $key => $room) {
            
           
            $room = ClassRoom::with("schedules")->find($room->id);
            // if($room->id != 1)
            // dd($room );

            $schedules = $room->schedules;
             
            // Fetch Meeting Times in this Time
            foreach ($schedules as $i => $s) {


                $a = strtotime($s->start);
                $b = strtotime($s->end);
                $nowTime  = time();

                // Check if time is now
                $is_at_this_time = $nowTime >= $a && $nowTime < $b;

                // $is_at_next_time = $nowTime < $a && $nowTime < $b;

                

                // Check if today
                $dayNumber = jdate('today')->toArray()["dayOfWeek"];
                // echo $dayNumber;
                $is_at_this_day = $dayNumber  == $s->day;

                // dd(jdate('W')->addDays(5)->getTimestamp()%2==1);
                // echo $is_at_this_day;
                if ($is_at_this_day && $is_at_this_time){
                
                    array_push($target_schedules , $s);
                    
                    $ccs_id = $s->pivot->id;
                    $meeting_id = Meeting::where("ccs_id","=",$ccs_id)->orderBy('created_at', 'desc')->first();
                    // dd($ccs_id);
                    
                }
            }
        }

        // Check user as Student or Teacher to join in room
        // if (!empty($meeting_id)){

            if ( $userType == "student" ){

                // Check meeting is running or not 
                $isRunning = Bigbluebutton::isMeetingRunning([
                    'meetingID' => $meeting_id,
                ]);
                if ( !$isRunning ) return "meeting is not running";
                

                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $meeting_id,
                        'userName' => $user->fullName,
                        'password' => 'attendeepwd' 
                    ])
                );

            }
            else {
                
                $meeting_id = rand(10000000,999999999);
                Meeting::create([
                    "ccs_id" =>  $ccs_id,
                    "meeting_code" => $meeting_id,
                    
                ]);
                
                return redirect()->to(
                    Bigbluebutton::start([
                        'meetingID' => $meeting_id,
                        // 'callbackURL' => "https://webhook.site/625f4cf7-2e55-4803-98a3-e92f2d65c72b",
                        'userName' => $user->fullName,
                        'moderatorPW' => 'moderatorpwd', //moderator password set here
                        'attendeePW' => 'attendeepwd',
                    ])
                );
            }
        // }



        return "meeting not found in this time";
    }


}
