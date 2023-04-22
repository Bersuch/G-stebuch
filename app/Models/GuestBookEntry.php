<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBookEntry extends Model
{
    use HasFactory;
    protected string $subtitle = '';
    protected string $body = '';
    protected $fillable = [
        'subtitle',
        'body',
        'user_id',
    ];

    /*public function userEntry() {
        return $this->belongsToMany(
            User::class, 
            UserEntries::class,
            'id', //Foreign Key on UserEntry Table
            'user_id' // Foreign Key on User Table
        );
    }*/

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function comments() {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
