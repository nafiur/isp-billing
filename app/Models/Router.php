<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Router extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }


}