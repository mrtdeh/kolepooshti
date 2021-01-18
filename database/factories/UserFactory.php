<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName,
            "lname" => $this->faker->lastName,
            "codemeli" => (int)rand(10000,99999),
            "mobile" => (int)rand(10000000,99999999),
            'password' => bcrypt('123'), // 123
            'remember_token' => Str::random(10),
        ];
    }


    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'admin',
            ];
        });
    }


    public function teacher()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'teacher',
            ];
        });
    }


    public function student()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'student',
            ];
        });
    }


    public function deputy()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'deputy',
            ];
        });
    }
}
