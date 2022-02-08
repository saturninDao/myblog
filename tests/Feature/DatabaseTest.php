<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function testValidUser(){
        //$faker = Factory::create();
       // $email = $faker->unique()->email;
        $count = User::count();

        $this->post("/register",[
            'email'=>'florent@nicolas.com',
            'name'=>'test',
            'password'=>'password',
            'password_confirmation' => 'password',
        ]);

        $newCount = User::count();

        $this->assertNotEquals($count,$newCount);

    }
}
