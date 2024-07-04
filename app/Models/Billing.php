<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Billing extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function generateRandomNumber()
    {
        try {
            $number = random_int(100000, 999999);
        } catch (\Exception $e) {
        }
        if (self::where('invoice', $number)->exists()) {
            return $this->generateRandomNumber();
        }
        return $number;
    }

}