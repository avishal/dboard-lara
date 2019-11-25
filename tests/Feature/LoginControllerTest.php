<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Matter;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /** @test */
    public function login_displays_login_form()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function login_displays_validation_errors()
    {
        $response  = $this->post(route('login'), []);
        // $response->assertRedirect(route('login'));
        $response->assertStatus(302);
        $response->assertSessionHasErrors("email");
    }

    /** @test */
    public function login_authenticates_and_redirects_user()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function functiontesting()
    {
        
        $matter = new Matter();
        $matterres = $matter->matterTest(2,3);
        $this->assertEquals($matterres, 5);

        $matterres = $matter->matterTest(2, -1);
        $this->assertNotEquals($matterres, 5);

        $matterres = $matter->matterTest(2, 0);
        $this->assertEquals($matterres, 0);

        $matterres = $matter->matterTest(0, 0);
        $this->assertEquals($matterres, 0);
    }
}
