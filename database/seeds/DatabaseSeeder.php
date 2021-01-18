<?php

namespace Database\Seeders;

use App\Models\Base;
use App\Models\User;
use App\Models\Course;
use App\Models\ClassRoom;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  User::factory(10)->create();

        // Populate roles
        User::factory()->admin()->count(2)->create();
        User::factory()->teacher()->count(20)->create();
        User::factory()->student()->count(100)->create();
        User::factory()->deputy()->count(10)->create();

        // Base::factory()

        // ->has(ClassRoom::factory()->count(12), 'posts')

        // ->count(3)->create();

         Base::factory()->count(3)->create();

        ClassRoom::factory()->count(40)->state(function (array $attributes) {
            return [
                'base_id' => rand(1,3),
            ];
        })->create();
        



        Course::factory()->count(10)->create();

        // Base::factory()->count(10)->create();
        
        // Populate users

        // Get all the roles attaching up to 3 random roles to each user
        $students = User::students();
        $deputies = User::deputies();
        $teachers = User::teachers();

        // print(User::teachers()->get()->random());

        // Populate the pivot table
        ClassRoom::all()->each(function ($room) use ($students , $deputies) { 

            // $room->base(
            //     $base->find(rand(1,5))->get()
            // ); 

            $room->courses()->sync([Course::all()->random()->id => [
               
                "teacher_id" => User::teachers()->get()->random()->id,
            ]]);

            $room->students()->attach(
                $students->get()->random(rand(20, 30))->pluck('id')->toArray()
            ); 

            $room->deputies()->attach(
                $deputies->get()->random(rand(1,3))->pluck('id')->toArray()
            ); 
        });



        // Course::all()->each(function ($course) use ($teachers) { 

        //     $course->teachers()->attach(
        //         $teachers->get()->random(1)->pluck('id')->toArray()
        //     ); 
        // });
    }
}
