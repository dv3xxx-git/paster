<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'timer',
        'text',
        'hash',
        'accept_public',
    ];

    public function getAcceptPublicAttribute($value)
    {
        $statusType = [
            0 => 'public',
            1 => 'non public',
        ];

        return $statusType[$value];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
