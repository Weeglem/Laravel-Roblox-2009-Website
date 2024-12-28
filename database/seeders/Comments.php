<?php

namespace Database\Seeders;

use App\Models\Asset\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Comments extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::Factory(10)->create();
    }
}
