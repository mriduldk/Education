<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BMC extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'bmc_id', 
        'bmc_name', 
        'bmc_phone', 
        'bmc_email', 
        'bmc_image_url',
        'bmc_office_name',
        'bmc_office_address',
        'bmc_dictrict',
        'bmc_block',
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by',
        'is_deleted'
    ];

    protected $hidden = [
        'bmc_password'
    ];




}