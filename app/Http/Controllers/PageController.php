<?php

namespace App\Http\Controllers;

use App\Models\Base;
use App\Models\Time;
use App\Models\User;
use App\Models\Course;
use App\Models\ClassRoom;

class PageController extends Controller
{



    public function showDashboard()
    {
        $breadcrumbs = [
            // ['link' => "modern", 'name' => ""], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Blank Page"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
        return view('pages.dashboard', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);
    }





    public function showBase() {
        $breadcrumbs = [
            // ['link' => "modern", 'name' => ""], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Blank Page"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];

        $bases = Base::all();

        return view('pages.base', compact("breadcrumbs","pageConfigs","bases"));
    }




    
    public function showClass() {

        $rooms = Base::find( request()->b )->rooms;
        // dd($rooms);
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ['link' => "/base/class", 'name' => "پایه دوازدهم"], 
            ['link' => "/base/class/course", 'name' => "کلاس ریاضی الف"], 
            ['name' => "درس شیمی"],
        ];

       
               
        return view('pages.class', compact("rooms","breadcrumbs","pageConfigs"));
    }



    public function showCourses() {

        $classId = request()->cls;

        if ( empty($classId)  ) return redirect()->back();

        $breadcrumbs = [
            ['link' => "/base/class", 'name' => "پایه دوازدهم"], 
            ['link' => "/base/class/course", 'name' => "کلاس ریاضی الف"], 
            ['name' => "درس شیمی"],
        ];

        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];

        $room = ClassRoom::find( $classId );
        $courses = $room->courses()->get();
        $teachers = User::teachers()->get();
        

        return view('pages.course', compact("room","courses","teachers","breadcrumbs","pageConfigs"));
    }



    public function showWeekPlan() {


        $classId = request()->cls;
        
        $breadcrumbs = [
            ['link' => "/base/class", 'name' => "پایه دوازدهم"], ['link' => "/base/class/course", 'name' => "کلاس ریاضی الف"], ['name' => "درس شیمی"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];

        $rooms = ClassRoom::with("courses")->get();
        $times = Time::all();
        
        
        return view('pages.weekplan', compact("rooms","times","breadcrumbs","pageConfigs"));
    }





    public function showChemistry() {

        $classId = request()->cls;
        $courseId = request()->crs;

        $breadcrumbs = [
            ['link' => "/base/class", 'name' => "پایه دوازدهم"], ['link' => "/base/class/course", 'name' => "کلاس ریاضی الف"], ['name' => "درس شیمی"],
        ];    
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];

        $room = ClassRoom::with("users")->find($classId);
        $students =  $room->users()->students()->get();
        $course = Course::find($courseId);

      
        return view('pages.lesson',  compact("room","students","course","breadcrumbs","pageConfigs"));
    }    


    

    public function showChemistryClass() {

        auth()->login(User::find(71));
        $nextm = app('App\Http\Controllers\MeetingController')->nextMeetingInfo();
        // dd($nextm );
        $breadcrumbs = [
            ['link' => "/base/class/meeting", 'name' => "پایه دوازدهم"], ['link' => "/base/class/course", 'name' => "کلاس ریاضی الف"], ['link' => "/base/class/course/chemistry", 'name' => "درس شیمی"], ['name' => "کلاس آنلاین"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
        return view('pages.meeting', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);
    }




    public function collapsePage()
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Page Collapse"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'bodyCustomClass' => 'menu-collapse'];

        return view('pages.page-collapse', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);
    }
}
