<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // 2 admins
        $admins = User::factory()->count(2)->admin()->create();

        // 3 organizers
        $organizers = User::factory()->count(3)->organizer()->create();

        // 10 customers
        User::factory()->count(10)->customer()->create();

        Event::factory()->count(5)->create([
            'created_by' => $admins->random()->id,
        ]);

        Event::factory()->count(3)->create([
            'created_by' => $organizers->random()->id,
        ]);
    }
}
