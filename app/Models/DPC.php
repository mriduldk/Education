<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DPC extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'dpc_id', 
        'dpc_name', 
        'dpc_phone', 
        'dpc_email', 
        'dpc_image_url',
        'dpc_office_name',
        'dpc_office_address',
        'dpc_dictrict',
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by',
        'is_deleted'
    ];

    protected $hidden = [
        'dpc_password'
    ];




}
