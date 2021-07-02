<?php

namespace App\Services;

use Hashids\Hashids;

class HashService
{
    public static function createHash($id)
    {
        $hashids = new Hashids('USSR');
        $encode_id = $hashids->encode($id);
        return $encode_id;
    }
}