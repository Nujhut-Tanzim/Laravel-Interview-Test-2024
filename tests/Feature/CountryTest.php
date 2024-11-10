<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_countries()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Country::factory()->count(2)->create();

        $response = $this->getJson('/countries');

        $response->assertStatus(200);
        $this->assertCount(2, $response->json());
    }

    public function test_store_creates_new_country()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'country_name' => 'Test Country',
            'code' => 'TST',
        ];

        $response = $this->postJson('/countries', $data);

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

        $this->assertDatabaseHas('countries', $data);
    }

    public function test_show_returns_country_details()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $country = Country::factory()->create();

        $response = $this->getJson("/countries/{$country->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'country_name' => $country->country_name,
                     'code' => $country->code
                 ]);
    }

    public function test_update_modifies_country()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $country = Country::factory()->create();
        $updatedData = [
            'updated_country_name' => 'Updated Country',
            'updated_code' => 'UPD',
        ];

        $response = $this->putJson("/countries/{$country->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

        $this->assertDatabaseHas('countries', [
            'id' => $country->id,
            'country_name' => 'Updated Country',
            'code' => 'UPD',
        ]);
    }

    public function test_destroy_deletes_country()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $country = Country::factory()->create();

        $response = $this->deleteJson("/countries/{$country->id}");

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

        $this->assertDatabaseMissing('countries', ['id' => $country->id]);
    }
}
