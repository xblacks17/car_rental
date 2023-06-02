<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded;

    protected $with = ['company'];

    //create created at date and updated at date cast   
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

    //create relationship with company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
