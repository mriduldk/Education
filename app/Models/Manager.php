<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    use HasFactory;

    
    protected $fillable = [
        'manager_id', 
        'manager_name', 
        'manager_phone', 
        'manager_email', 
        'manager_image_url',
        'manager_office_name',
        'manager_office_address',
        'manager_dictrict',
        'manager_type',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        'deleted_on',
        'deleted_by',
        'is_deleted'
    ];

    protected $hidden = [
        'manager_password'
    ];

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["IS", "DPC", "DMC", "DEEO"][$value],
        );
    }
}
