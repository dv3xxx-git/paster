<?php

namespace Database\Factories;

use App\Models\Paste;
use App\Services\HashService;
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
        $iter = [
            0 => '10 minutes',
            1 => '1 hours',
            2 => '3 hours',
            3 => '1 days',
            4 => '1 week',
            5 => '1 months',
        ];
        $lang = [
            0 => 'php',
            1 => 'js',
            2 => 'html',
        ];
        return [
            'name' => $this->faker->name(),
            'timer' => Carbon::now()->add($iter[rand(0,5)]),
            'text' => $this->faker->realText(200),
            'change_lang' => $lang[rand(0,2)],
            'hash' => HashService::createHash(rand(1,50)),
            'accept_public' => rand(0,2),
            'accept_timer' => rand(0,1),
        ];
    }
}
