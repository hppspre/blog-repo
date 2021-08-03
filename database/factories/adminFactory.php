<?php

namespace Database\Factories;

use App\Models\admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Hash;


class adminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
    */
    public function definition()
    {
        return [
                'userName'=>Str::random(100),
                'password'=>Hash::make(1),
        ];
    }
}
