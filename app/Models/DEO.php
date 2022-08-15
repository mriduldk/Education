<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DEO extends Authenticatable
{
    use HasFactory;

    
    protected $fillable = [
        'deo_id', 
        'deo_name', 
        'deo_phone', 
        'deo_email', 
        'deo_image_url',
        'deo_office_name',
        'deo_office_address',
        'deo_dictrict',
        'deo_type',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        'deleted_on',
        'deleted_by',
        'is_deleted'
    ];

    protected $hidden = [
        'deo_password'
    ];
     
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["IS", "DPC", "DMC", "DEEO", "DI", "BEEO", "BMC", "CHD"][$value],
        );
    }
}
