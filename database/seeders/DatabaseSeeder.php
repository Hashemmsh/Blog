<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Experience;
use App\Models\Interst;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::truncate();
        Service::truncate();
        Experience::truncate();
        Skill::truncate();
        Interst::truncate();
        Portfolio::truncate();

        User::factory(50)->create();
        Service::factory(50)->create();
        Experience::factory(20)->create();
        Skill::factory(50)->create();
        Interst::factory(50)->create();
        Portfolio::factory(100)->create();
    }
}
