<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\author;

class authorseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        author::Factory()->count(50)->create();
    }
}
