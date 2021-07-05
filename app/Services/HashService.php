<?php

namespace App\Services;

use Hashids\Hashids;

class HashService
{
    public static function createHash($id)
    {
        $hashids = new Hashids('USSR');
        $encode_id = $hashids->encode($id);
        $encode_id = rand(1,100) . $encode_id . rand(0,10);
        return $encode_id;
    }
}