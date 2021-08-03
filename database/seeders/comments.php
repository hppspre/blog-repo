<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\comments as comment;
 

class comments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postIDs = DB::table('posts')->pluck('id');
        $userIDs = DB::table('users')->pluck('id');
        
        DB::table('comments')->insert([
            'postid'=>$postIDs[0],
            'user_id'=>$userIDs[0],
            'comment'=>Str::random(100),
        ]);

        // comments::factory()->count(1)->create();
    }
}
