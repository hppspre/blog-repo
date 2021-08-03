<?php

namespace Database\Factories;

use App\Models\comments;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class commentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = comments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postIDs = DB::table('posts')->pluck('id');
        $userIDs = DB::table('users')->pluck('id');

        return [
            'postid'=>$faker->randomElement($postIDs),
            'user_id'=>$faker->randomElement($userIDs),
            'comment'=>Str::random(100),
        ];
    }
}
