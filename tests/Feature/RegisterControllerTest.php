<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateNewUser()
    {
        $response = $this->post(route('register'), ['name'=>'vishal','email' => 'vbadheli@dboard.com','password'=>'12345678', 'password_confirmation' => '12345678']);
        // $response = $this->post(route('register'), ['name'=>'test','email' => 'testReg@dboard.com','password'=>'12345678', 'password_confirmation' => '12345678','role_id'=>2]);
        
        $response->dump();
        $response->assertRedirect(route('home'));
        // $response->assertStatus(200);
    }
}
