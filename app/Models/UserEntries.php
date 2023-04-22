<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEntries extends Model
{
    use HasFactory;

    protected BigInteger $userId;
    protected BigInteger $entryId;
    protected $fillable = [
        'user_id',
        'entry_id',
        'post_id'
    ];
}
