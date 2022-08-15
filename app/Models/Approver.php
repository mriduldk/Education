<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Approver extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'approver_id', 
        'approver_name', 
        'approver_phone', 
        'approver_email', 
        'approver_image_url',
        'approver_office_name',
        'approver_office_address',
        'approver_dictrict',
        'approver_type',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        'deleted_on',
        'deleted_by',
        'is_deleted'
    ];

    protected $hidden = [
        'approver_password'
    ];

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["IS", "DPC", "DMC", "DEEO", "DI", "BEEO", "BMC", "CHD"][$value],
        );
    }
}
