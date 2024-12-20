<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Roland Adams',
            'email' => 'adamsrolly7@gmail.com',
            'password'=>'$2y$12$3Nc/GNYKpNYaVFlLXaCXu.sn80lnXqnklwiLX/RJQ87I32PYQLVkC'
        ]);
    }
}
