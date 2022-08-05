<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DEEO extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'deeo_id', 
        'deeo_name', 
        'deeo_phone', 
        'deeo_email', 
        'deeo_image_url',
        'deeo_office_name',
        'deeo_office_address',
        'deeo_dictrict',
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by',
        'is_deleted'
    ];

    protected $hidden = [
        'deeo_password'
    ];




}

