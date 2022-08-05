<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolEntrolmentOfStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_entrolment_of_student_id', 
        'fk_school_id', 
        'pre_primary', 
        'class_1', 
        'class_2', 
        'class_3', 
        'class_4', 
        'class_5', 
        'class_6', 
        'class_7', 
        'class_8', 
        'class_9', 
        'class_10', 
        'class_11', 
        'class_12', 
        'class_1_12', 
        'class_1_12_with_pre_primary', 
        'total_teachers', 
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by', 
        'is_deleted'
    ];


}
