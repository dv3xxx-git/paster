<?php

namespace App\Services;

use Faker\Factory;
use Hashids\Hashids;

class HashService
{
    public static function createHash($id)
    {
        $faker = Factory::create();
        $hashids = new Hashids($faker->word(5));
        $encode_id = $hashids->encode($id);
        $encode_id = rand(1,100) . $encode_id . rand(0,10);
        return $encode_id;
    }
}