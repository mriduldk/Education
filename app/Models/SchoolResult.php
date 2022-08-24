<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_r_id', 
        'fk_school_id', 
        'class', 
        'stream', 
        'year', 
        'fst_division', 
        'snd_division', 
        'trd_visision', 
        'fail', 
        'total_appeared', 
        'distinction', 
        'star', 
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by', 
        'is_deleted'
    ];


}