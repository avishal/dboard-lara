<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\StoreMatter;
use App\User;

class MatterControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        // $this->withoutExceptionHandling();
        /*$sm = new StoreMatter();
        $sm->case_number = 7715;
        $sm->year = 2015;
        $sm->bench_id = 1;
        $sm->case_side_id = 1;
        $sm->case_type_id = 1;
        $sm->stamp_register_id = 1;*/

        $data = [
        "case_number" => 7715,
        "year" => 2015,
        "bench_id" => 1,
        "case_side_id" => 1,
        "case_type_id" => 1,
        "stamp_register_id" => 1];

        $user = User::find(4);
        $response = $this->actingAs($user)->post(route('new-matter'), $data);
        $response->dump();
        $response->assertRedirect(route('home'));
        $response->assertStatus(200);
    }

    /*public function testValidationError()
    {
        // $this->withoutExceptionHandling();
        $data = [
        "case_number" => 7715,
        "year" => 2015,
        "bench_id" => 1,
        "case_side_id" => 1,
        "case_type_id" => 1,
        "stamp_register_id" => 1];

        $user = User::find(4);
        $response = $this->actingAs($user)->post(route('new-matter'), $data);
        // $response->dump();
        $response->assertRedirect(route('new-matter'));
        $response->assertStatus(200);
    }*/
}
