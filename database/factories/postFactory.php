<?php

namespace Database\Factories;

use App\Models\post;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class postFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIDs = DB::table('users')->pluck('id');
        return [
            'user_id'=>$this->faker->randomElement($userIDs),
            'image'=>'0803202110373161091c6b5eb3bblogpost.jpg',
            'title'=>Str::random(100),
            'description'=>Str::random(100),
            'status'=>'modified'
        ];
    }
}
