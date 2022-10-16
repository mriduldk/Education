<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'category_id',
        'gallery_image',
        'created_on',
        'created_by',
        'deleted_on',
        'deleted_by',
        'is_deleted'
    ];

}
