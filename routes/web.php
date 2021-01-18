<?php

use App\Models\Time;
use App\Models\User;
use App\Models\Course;
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


Route::post('/meeting/check', 'MeetingController@check');
// Page Route
Route::middleware(["web"])->group(function(){


    Route::get('/', 'PageController@showDashboard');
    Route::get('/base', 'PageController@showBase');
    Route::get('/base/class', 'PageController@showClass');
    Route::get('/base/class/courses', 'PageController@showCourses');

    Route::get('/base/class/course/chemistry', 'PageController@showChemistry');
    Route::get('/base/class/course/chemistry/class', 'PageController@showChemistryClass');
    Route::get('/page-blank', 'PageController@blankPage');
    Route::get('/page-collapse', 'PageController@collapsePage');
    Route::get('/weekplan', 'PageController@showWeekPlan');



    Route::post('/course/save', 'CourseController@save');
    Route::post('/weekplan/save', 'WeekPlanController@save');
    Route::post('/weekplan/time/add', 'WeekPlanController@addTime');
    // Route::post('/schedule/save', 'ScheduleController@save');
    Route::post('/user/save', 'UserController@save');
});


// locale route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);


// Route::get('/login', 'LoginController@login');


Route::get("/runsql",function(){

    $sdb = DB::connection("mysql2");

 


    // $users =  $sdb->table('users')->get();
    // dd(count($users));
    // foreach ($users as $key => $u) {
    //     User::create((array)$u);
    // }

    // $rooms = $sdb->table('rooms')->get();
    // foreach ($rooms as $key => $u) {
    //     ClassRoom::create((array)$u);
    // }

    // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    // DB::table('class_user')->delete();
    // DB::statement('SET FOREIGN_KEY_CHECKS = 1');
   

    
    // $users = $sdb->table('users')
    // ->join("room_user","users.id","=","room_user.user_id")->get();
    // // ->where("users.type","=","student")->orWhere("users.type","=","deputy")->get();
    // foreach ($users as $key => $s) {
    //     ClassRoom::find($s->room_id)->users()->attach($s->user_id);
    // }

    // $users = $sdb->table('users')->get();
    //     foreach ($users as $key => $u) {
    //         $finds = $sdb->table('room_user')->where("user_id","=",$u->id)->get();
    //         if(count($finds) > 1){
    //             echo "<br>".$u->id;
    //         }
    //     }

         $users = $sdb->table('room_user')->where("room_id","=",request()->id)->get();
         $room = $sdb->table('rooms')->where("id","=",request()->id)->first();
         echo "room : " . $room->name ."<br><br>";
        foreach ($users as $key => $u) {
            
            $user = $sdb->table('users')->where("id","=",$u->user_id)->first();
            
            echo "<br>".$user->fname . " " . $user->lname . " : " . $user->username;
        }
    

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

Auth::routes(['verify' => true]);
