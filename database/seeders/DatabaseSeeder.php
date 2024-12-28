<?php

namespace Database\Seeders;

use App\Models\Asset\AssetConfig;
use App\Models\User\User;
use App\Models\Asset\Asset;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        User::factory(10)->create();
        Asset::factory(10)->create();
        AssetConfig::factory(10)->create();

    }
}
