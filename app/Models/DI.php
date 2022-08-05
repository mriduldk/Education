<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DI extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'di_id', 
        'di_name', 
        'di_phone', 
        'di_email', 
        'di_image_url',
        'di_office_name',
        'di_office_address',
        'di_dictrict',
        'di_block',
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by',
        'is_deleted'
    ];

    protected $hidden = [
        'di_password'
    ];

}