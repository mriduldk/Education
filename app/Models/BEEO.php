<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BEEO extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'beeo_id', 
        'beeo_name', 
        'beeo_phone', 
        'beeo_email', 
        'beeo_image_url',
        'beeo_office_name',
        'beeo_office_address',
        'beeo_dictrict',
        'beeo_block',
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by',
        'is_deleted'
    ];

    protected $hidden = [
        'beeo_password'
    ];

}
