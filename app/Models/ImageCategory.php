<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{
    use HasFactory;
        
    protected $fillable = [
        'category_id',
        'category_title',
        'created_on',
        'created_by',
        'deleted_on',
        'deleted_by',
        'is_deleted'
    ];

}
