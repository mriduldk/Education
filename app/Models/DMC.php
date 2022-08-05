<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DMC extends  Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'dmc_id', 
        'dmc_name', 
        'dmc_phone', 
        'dmc_email', 
        'dmc_image_url',
        'dmc_office_name',
        'dmc_office_address',
        'dmc_dictrict',
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by',
        'is_deleted'
    ];

    protected $hidden = [
        'dmc_password'
    ];




}
