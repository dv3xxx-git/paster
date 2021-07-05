<?php

namespace Database\Factories;

use App\Models\Paste;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paste::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //  10m 1h 3h 1d 1w 1m
        $iter = [
            0 => '10 minutes',
            1 => '1 hours',
            2 => '3 hours',
            3 => '1 days',
            4 => '1 week',
            5 => '1 months',
        ];
        return [
            'name' => $this->faker->name(),
            'timer' => Carbon::now()->add($iter[rand(0,5)]),
            'text' => $this->faker->realText(200),
        ];
    }
}
