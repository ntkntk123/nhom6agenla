<?php

namespace Database\Seeders;

use App\Models\Shopping_cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Shopping_cartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shopping_cart::factory()->count(15)->create();

    }
}
