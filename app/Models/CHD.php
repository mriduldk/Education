<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CHD extends Authenticatable
{
    use HasFactory;


    protected $fillable = [
        'chd_id', 
        'chd_name', 
        'chd_phone', 
        'chd_email', 
        'chd_image_url',
        'is_deleted'
    ];

    protected $hidden = [
        'chd_password'
    ];


}
