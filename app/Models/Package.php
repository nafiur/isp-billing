<?php

namespace App\Models;

use App\Models\Router;
use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $guarder = [];

    public function router()
    {
        return $this->belongsTo(Router::class);
    }
}