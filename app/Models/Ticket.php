<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function generateRandomNumber()
    {
        try {
            $number = random_int(100000, 999999);
        } catch (\Exception $e) {
        }
        if (self::where('number', $number)->exists()) {
            return $this->generateRandomNumber();
        }
        return $number;
    }
}