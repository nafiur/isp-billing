<?php

namespace App\Models;

use App\Models\Router;
use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function router()
    {
        return $this->belongsTo(Router::class);
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