<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_create_an_event()
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);
    
        $this->actingAs($admin, 'sanctum');
    
        $data = [
            'title'       => 'Laravel Conference',
            'description' => 'A conference about Laravel best practices.',
            'date'        => '2025-12-01',
            'location'    => 'Prishtina',
            'created_by'  => $admin->id,
        ];
    
        $response = $this->postJson('/api/events', $data);
    
        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'success' => true,
                     'message' => 'Event created successfully',
                     'title' => 'Laravel Conference',
                     'location' => 'Prishtina',
                     'created_by' => $admin->id,
                 ]);
    
        $this->assertDatabaseHas('events', [
            'title' => 'Laravel Conference',
            'created_by' => $admin->id,
        ]);
    }
}
