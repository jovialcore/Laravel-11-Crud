<?php

namespace Tests\Feature;

use App\Models\Marketing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CrudTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('passport:client', ['--personal' => true, '--env' => 'testing']);

    }

    /**
     * A basic feature test example.
     */

    public function test_users_can_register_successfully()
    {

        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => 'password',
            'password_confirmation' => 'password'
        ];
        $response = $this->post('api/register', $userData);

        $response->assertJsonFragment([

            'response' => true,
            'status' => 201,
            'message ' => 'User created successfully'
        ]);
    }


    public function test_can_list_marketing_channels()
    {
        Marketing::factory()->count(3)->create();


        $response = $this->get("api/list");

        $response->assertStatus(200);
    }
    public function test_can_update_marketing_channel()
    {

        $marketingChannel = Marketing::factory()->create();


        $updateData = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence
        ];


        $response = $this->put("api/{$marketingChannel->id}/update", $updateData);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Channel has been updated successfully']);

        $this->assertDatabaseHas('marketing_channels', $updateData);
    }


    public function test_cannot_update_nonexistent_marketing_channel()
    {

        $response = $this->put("api/9999/update", ['name' => 'wild thinggg']);


        $response->assertStatus(404)
            ->assertJson(['message' => "Couldn't find marketing channel"]);
    }



    public function test_can_delete_marketing_channel()
    {

        $marketingChannel = Marketing::factory()->create();


        $response = $this->delete("api/{$marketingChannel->id}/delete");


        $response->assertStatus(200)
            ->assertJson(['message' => 'Marketing channel deleted successfully']);


        $this->assertDatabaseMissing('marketing_channels', ['id' => $marketingChannel->id]);
    }

    public function test_cannot_delete_nonexistent_marketing_channel()
    {

        $response = $this->delete("api/9999/delete");

        $response->assertStatus(404)
            ->assertJson(['message' => "Couldn't find marketing channel"]);
    }
}
