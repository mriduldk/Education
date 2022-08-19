<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'login_al_id',
        'fk_user_id',
        'login_date_time',
        'login_message',
        'is_deleted'
    ];
}
