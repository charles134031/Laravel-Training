<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class bookseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::Factory()->count(50)->create();
    }
}
