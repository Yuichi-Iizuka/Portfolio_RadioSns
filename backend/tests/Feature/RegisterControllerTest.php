<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegisterControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCreate()
    {
        $username = 'テストユーザー';
        $useremail = 'testtest@test.co.jp';
        $userpassword = 'password1234';
        $userpasswordconfirmation = 'password1234';



        $response = $this->from('program')->post(route('register'),[
            'name' => $username,
            'email' => $useremail,
            'password' => $userpassword,
            'password_confirmation' => $userpasswordconfirmation,
        ]);

        $this->assertDatabaseHas('users',[
            'name' => $username,
            'email' => $useremail,
            ]);

        $this->assertTrue(Hash::check($userpassword,
        User::where('name',$username)->first()->password));

        $response->assertRedirect(route('program.index'));
    }
}
