<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CourseController extends Controller
{

    public function save(Request $req)
    {
       
        // $img = $req->validate([
        //     'course_image' => 'required|image',
        // ]);

        // $img = $img["course_image"];
        // $filename = "";

        // if ($img !== null) {
            
        //     $filename  = "course_banner_" . time() . "." .$img->extension(); 
        //     $img->move(public_path('uploads'), $filename);
            // Storage::disk('upload')->put($img->tmp_name, $filename);

        
        // }
        
        $course = Course::firstOrCreate(["name" => $req->course_name],[]);

        ClassRoom::addCourse([

            "class_id" => $req->cls_id,
            "course_id" => $course->id,
            "teacher_id" => $req->course_teacher,
        ]);
    
        return redirect()->back();
    }


}


