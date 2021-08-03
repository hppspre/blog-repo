<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(1)->create();
        // DB::table('users')->insert([
        //     'name'=>Str::random(10),
        //     'email'=>Str::random(10).'@gmail.com',
        //     'phone'=>mt_rand(10,100),
        //     'profile_pic'=>'0803202110361561091c1f90443bloguser.jpg',
        //     'password'=>'$2y$10$f8WgnmKnRMjji.CTzbqIsOAShyOjxDUayBN7syu9fepKnTxetjwa.'
        // ]);
    }
}
