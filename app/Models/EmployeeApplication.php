<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeApplication extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'application_type_id',
        'user_id',
        'description',
        'files',
        'type'
    ];

}
