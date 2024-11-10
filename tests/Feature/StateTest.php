<?php
namespace Tests\Feature;

use App\Models\State;
use App\Models\User;
use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StateTest extends TestCase
{
    use RefreshDatabase;

    
    public function test_index_returns_all_states_or_filtered()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $country = Country::factory()->create();
        State::factory()->create(['country_id' => $country->id, 'state_name' => 'Test State']);

        // Without search
        $response = $this->getJson('/states');
        $response->assertStatus(200)
                 ->assertJsonCount(1);

        // With search
        $response = $this->getJson('/states?search=Test');
        $response->assertStatus(200)
                 ->assertJsonCount(1);
    }

    // Test store method (create a new state)
    public function test_store_creates_state()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $country = Country::factory()->create();
        $data = [
            'state_name' => 'New State',
            'area' => '1000 sq km',
            'country_id' => $country->id,
        ];

        $response = $this->postJson('/states', $data);
        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

        $this->assertDatabaseHas('states', $data);
    }

    // Test show method (get state details)
    public function test_show_returns_state_details()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $country = Country::factory()->create();
        $state = State::factory()->create(['country_id' => $country->id]);

        $response = $this->getJson("/states/{$state->id}");
        $response->assertStatus(200)
                 ->assertJson([
                     'state_name' => $state->state_name,
                     'area' => $state->area,
                     'country_id' => $state->country_id
                 ]);
    }

    // Test update method (update state)
    public function test_update_modifies_state()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $country = Country::factory()->create();
        $state = State::factory()->create(['country_id' => $country->id]);

        $updatedData = [
            'updated_state_name' => 'Updated State',
            'updated_area' => 1200.0,
            'country_id' => $country->id,
        ];

        $response = $this->putJson("/states/{$state->id}", $updatedData);
        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

                 $this->assertDatabaseHas('states', [
                    'id' => $state->id,  
                    'state_name' => 'Updated State',  
                    'area' => 1200.0,
                    'country_id' => $country->id,
                ]);
    }

    // Test destroy method (delete state)
    public function test_destroy_deletes_state()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $country = Country::factory()->create();
        $state = State::factory()->create(['country_id' => $country->id]);

        $response = $this->deleteJson("/states/{$state->id}");
        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

        $this->assertDatabaseMissing('states', ['id' => $state->id]);
    }
}
