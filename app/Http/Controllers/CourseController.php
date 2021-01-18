<?php

namespace App\Http\Controllers;

use App\Models\Course;
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
        
        $course = Course::firstOrCreate(["name" => $req->course_name],[

            // "color" => $req->course_color,
            // "icon" => $req->course_icon,
            // "image" => $filename,
        
        ]);

        // $meeting_id = rand(1000000,9999999);
        $course->teachers()->sync([

            $req->course_teacher => [ "class_id" => $req->cls_id ]
            
        ]);
    
        return redirect()->back();
    }


}


