<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Series;
use App\Models\User;
use App\Services\YouTubeService;
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
        $youtubeService = new YouTubeService();

        $php_series = Series::factory()->create([
            'user_id' => $user,
            'title' => 'Learn PHP The Right Way - Full PHP Tutorial For Beginners & Advanced',
            'playlist_url' => 'https://www.youtube.com/playlist?list=PLr3d3QYzkw2xabQRUpcZ_IBk9W50M9pe-',
        ]);

        $php_series->episodes()->createMany($youtubeService->fetchAllVideosFromPlaylist($php_series->playlist_url));

        $react_series = Series::factory()->create([
            'user_id' => $user,
            'title' => 'React for Beginners',
            'playlist_url' => 'https://www.youtube.com/playlist?list=PLHiZ4m8vCp9M6HVQv7a36cp8LKzyHIePr',
        ]);

        $react_series->episodes()->createMany($youtubeService->fetchAllVideosFromPlaylist($react_series->playlist_url));

        $laravel_series = Series::factory()->create([
            'user_id' => $user,
            'title' => '30 Days to Learn Laravel',
            'playlist_url' => 'https://www.youtube.com/playlist?list=PL3VM-unCzF8hy47mt9-chowaHNjfkuEVz',
        ]);

        $laravel_series->episodes()->createMany($youtubeService->fetchAllVideosFromPlaylist($laravel_series->playlist_url));


    }
}
