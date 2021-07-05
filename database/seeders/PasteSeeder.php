<?php

namespace Database\Seeders;

use App\Models\Paste;
use App\Models\User;
use Illuminate\Database\Seeder;

class PasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paste::factory(100)->create();
        User::factory(10)->create();
    }
}
