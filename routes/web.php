

<?php

use App\Models\Base;
use App\Models\Time;
use App\Models\User;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LanguageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
//  Auth::routes(['verify' => true]);

Route::post('/meeting/check', 'MeetingController@check');
Route::get('/meetig/list', 'MeetingController@list');
Route::get('/meeting/select', 'MeetingController@select');
Route::get('/', 'LoginController@login')->name("login");
Route::get('/reset-password', 'LoginController@showReset');
Route::post('/reset-password/reset', 'LoginController@reset');

Route::get('/hook/create',function(){
    return dd(Bigbluebutton::hooksCreate([
        'callbackURL' => 'https://webhook.site/625f4cf7-2e55-4803-98a3-e92f2d65c72b', //required
      
  ]));
});

Route::get('/hook/destroy',function(){
    return dd(Bigbluebutton::hooksDestroy(1));
});


Route::post('/course/save', 'CourseController@save');
Route::post('/weekplan/save', 'WeekPlanController@save');
Route::post('/weekplan/time/add', 'WeekPlanController@addTime');
// Route::post('/schedule/save', 'ScheduleController@save');
Route::post('/user/save', 'UserController@save');
// Page Route
Route::middleware(["web"])->prefix("panel")->group(function(){


    Route::get('/', 'PageController@showDashboard');
    Route::get('/base', 'PageController@showBase');
    Route::get('/base/class', 'PageController@showClass');
    Route::get('/base/class/courses', 'PageController@showCourses');

    Route::get('/base/class/course/chemistry', 'PageController@showChemistry');
    Route::get('/base/class/course/chemistry/class', 'PageController@showChemistryClass');
    Route::get('/page-blank', 'PageController@blankPage');
    Route::get('/page-collapse', 'PageController@collapsePage');
    Route::get('/weekplan', 'PageController@showWeekPlan');



});

//sdfsdf
// locale route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);



Route::get("/runsql",function(){

    $sdb = DB::connection("mysql2");

    

    // $course = Course::firstOrCreate([ "name" => "کلاس آزمایشی " ]);
    // $schedule = Schedule::firstOrCreate([
    //     "start" => "11:00",
    //     "end" =>  "14:30",
    //     "type" => "0",
    //     "day" => "5",
    //     ]);
    // $teacher = User::where( "username" ,"=","4420724870" )->first();
    // $rooms = ClassRoom::where('name' ,'like', 'دهم%')
    // ->orWhere('name' ,'like', 'یازدهم%')->get();
    // foreach ($rooms as $key => $r) {
    //     ClassRoom::addCourse([
    //         "class_id" => $r->id,
    //         "course_id" => $course->id,
    //         "teacher_id" => $teacher->id,
    //         "schedule_id" => $schedule->id,
    //     ]);
    // }

    // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    // // DB::table('users')->delete();
    // DB::table('users')->delete();
    // DB::statement('SET FOREIGN_KEY_CHECKS = 1');
   
   


    // $users =  $sdb->table('users')->get();
    // // dd(count($users));
    // foreach ($users as $key => $u) {
    //     User::firstOrCreate(["username" => $u->username],[
    //         "fname" => $u->first_name,
    //         "lname" => $u->last_name,
            
    //         "mobile" => $u->phone,
    //         "password" => $u->password,
    //         "email" => $u->email,
    //         "avatar" => $u->avatar,
    //         "created_at" => $u->created_at,
    //         "updated_at" => $u->updated_at,
         
    //     ]);
    // }


    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    DB::table('class')->delete();
    DB::table('class_user')->delete();
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
   

    $rooms = $sdb->table('rooms')->get();
    // dd($rooms);
    foreach ($rooms as $key => $u) {
        ClassRoom::create((array)$u);
    }


    
    $users = $sdb->table('users')
    ->join("room_user","users.id","=","room_user.user_id")->get();
    // ->where("users.type","=","student")->orWhere("users.type","=","deputy")->get();
    foreach ($users as $key => $s) {
        
        ClassRoom::find($s->room_id)->users()->attach($s->user_id);
    }

    // $users = $sdb->table('users')->get();
    //     foreach ($users as $key => $u) {
    //         $finds = $sdb->table('room_user')->where("user_id","=",$u->id)->get();
    //         if(count($finds) > 1){
    //             echo "<br>".$u->id;
    //         }
    //     }

        //  $users = $sdb->table('room_user')->where("room_id","=",request()->id)->get();
        //  $room = $sdb->table('rooms')->where("id","=",request()->id)->first();
        //  echo "room : " . $room->name ."<br><br>";
        // foreach ($users as $key => $u) {
            
        //     $user = $sdb->table('users')->where("id","=",$u->user_id)->first();
            
        //     echo "<br>".$user->fname . " " . $user->lname . " : " . $user->username;
        // }
    

    // $courses = $sdb->table('meetings')->select('name')->groupBy('name')->get();
    // foreach ($courses as $key => $c) {
    //     Course::create([
    //         "name" => $c->name
    //     ]);
    // }

    // $times = $sdb->table('time_plans')->select('start_time','end_time')->groupBy(['start_time','end_time'])->get();
    // foreach ($times as $key => $c) {
    //     Time::create([
    //         "start" => $c->start_time,
    //         "end" => $c->end_time
    //     ]);
    // }



    // $courses = $sdb->table('meetings')->select('id','name')->groupBy('id','name')->get();
    // $data = [];

    // foreach ($courses as $key => $c) {

    //    $courseId = Course::where("name","=",$c->name)->first()->id;
    //    $classId = $sdb->table('meeting_room')->where("meeting_id","=",$c->id)->first()->room_id;
    //    $teacherId = $sdb->table('meeting_user')->where("meeting_id","=",$c->id)->first()->user_id;

    //     array_push($data, [
    //         "course_id" => $courseId,
    //         "class_id" => $classId,
    //         "teacher_id" => $teacherId,
    //     ]);
    // }
    // DB::table("class_course_schedule")->insert($data);





    // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    // Schema::dropIfExists('users');
    // DB::statement('SET FOREIGN_KEY_CHECKS = 1');

});


