<?php
namespace Tests\Feature;

use App\Models\City;
use App\Models\State;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    // Test Index method (retrieve cities)
    public function test_index_returns_all_or_filtered_cities()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $state = State::factory()->create();
        City::factory()->create(['state_id' => $state->id, 'city_name' => 'Test City']);
        
        // Test without search
        $response = $this->getJson('/cities');
        $response->assertStatus(200)
                 ->assertJsonCount(1);
        
        // Test with search query (by city name)
        $response = $this->getJson('/cities?search=Test');
        $response->assertStatus(200)
                 ->assertJsonCount(1);
        
        // Test with search query not find 
        $response = $this->getJson('/cities?search=TestState');
        $response->assertStatus(200)
                 ->assertJsonCount(0);
    }

    // Test Store method (create city)
    public function test_store_creates_city()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $state = State::factory()->create();
        $data = [
            'city_name' => 'New City',
            'population' => 1000000,
            'area' => 500.0,
            'state_id' => $state->id
        ];

        $response = $this->postJson('/cities', $data);
        $response->assertStatus(200)
                 ->assertJson(['success' => true, 'message' => 'City add successfully']);

        // Assert the city is stored in the database
        $this->assertDatabaseHas('cities', $data);
    }

    // Test Show method (retrieve city details)
    public function test_show_returns_city_details()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $state = State::factory()->create();
        $city = City::factory()->create(['state_id' => $state->id]);

        $response = $this->getJson("/cities/{$city->id}");
        $response->assertStatus(200)
                 ->assertJson([
                     'city_name' => $city->city_name,
                     'population' => $city->population,
                     'area' => $city->area,
                     'state_id' => $city->state_id,
                 ]);
    }

    // Test Update method (update city)
    public function test_update_modifies_city()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $state = State::factory()->create();
        $city = City::factory()->create(['state_id' => $state->id]);

        $updatedData = [
            'updated_city_name' => 'Updated City',
            'updated_population' => 1200000,
            'updated_area' => 600.0,
            'state_id' => $state->id
        ];

        $response = $this->putJson("/cities/{$city->id}", $updatedData);
        $response->assertStatus(200)
                 ->assertJson(['success' => true, 'message' => 'City details updated successfully']);

        // Assert the city was updated in the database
        $this->assertDatabaseHas('cities', [
            'id' => $city->id,
            'city_name' => 'Updated City',
            'population' => 1200000,
            'area' => 600.0,
            'state_id' => $state->id,
        ]);
    }

    // Test Destroy method (delete city)
    public function test_destroy_deletes_city()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $state = State::factory()->create();
        $city = City::factory()->create(['state_id' => $state->id]);

        $response = $this->deleteJson("/cities/{$city->id}");
        $response->assertStatus(200)
                 ->assertJson(['success' => true, 'message' => 'City deleted successfully.']);

        // Assert the city is deleted from the database
        $this->assertDatabaseMissing('cities', ['id' => $city->id]);
    }


}
