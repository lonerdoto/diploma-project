<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispatcherApplication extends Model
{
    protected $fillable = [
        'initiator',
        'user_id',
        'system_name',
        'planned_work',
        'work_duration',
        'approval_date',
        'approval_result',
        'communicated_by'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
