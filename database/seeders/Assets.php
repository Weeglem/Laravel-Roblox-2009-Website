<?php

namespace Database\Seeders;

use App\Models\Asset\Asset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Assets extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::factory(10)->create();
    }
}
