<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Series;
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
        $user =  User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $php_series = Series::factory()->create([
            'user_id' => $user,
            'title' => 'PHP for Beginners',
        ]);
        $react_series = Series::factory()->create([
            'user_id' => $user,
            'title' => 'React for Beginners',
        ]);
        $laravel_series = Series::factory()->create([
            'user_id' => $user,
            'title' => 'Laravel for Beginners',
        ]);
        Episode::factory(10)->create([
            'series_id' => $php_series,
        ]);
        Episode::factory(10)->create([
            'series_id' => $react_series,
        ]);
        Episode::factory(10)->create([
            'series_id' => $laravel_series,
        ]);
    }
}
