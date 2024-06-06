<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'director-name',
        'email',
        'phone',
        'avatar',
        'department',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function employeeApplications() {
        return $this->hasMany(EmployeeApplication::class);
    }


}
