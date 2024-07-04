<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Detail;
use App\Models\Billing;
use App\Models\Payment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function isUser()
    {
        return $this->role == 'user';
    }

    public function due_amount($id)
    {
        $user = self::where('id', $id)->firstOrFail();

        $bill = Billing::where('user_id', $user->id)->sum('package_price');
        $pay = Payment::where('user_id', $user->id)->sum('package_price');

        return $bill - $pay;
    }

    public function detail()
    {
        return $this->hasOne(Detail::class);
    }

    public function billing()
    {
        return $this->hasMany(Billing::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}