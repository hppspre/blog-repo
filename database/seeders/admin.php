<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin as administrator;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        administrator::factory()->count(1)->create();
    }
}
