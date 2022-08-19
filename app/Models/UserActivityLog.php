<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_al_id',
        'fk_user_id',
        'fk_action_taken_user_id',
        'action_taken_user_name',
        'date_time',
        'message',
        'action',
        'is_deleted'
    ];
}
