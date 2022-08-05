<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class IS extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'is_id', 
        'is_name', 
        'is_phone', 
        'is_email', 
        'is_image_url',
        'is_office_name',
        'is_office_address',
        'is_dictrict',
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by',
        'is_deleted'
    ];

    protected $hidden = [
        'is_password'
    ];


}
