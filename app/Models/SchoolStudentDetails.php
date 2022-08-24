<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolStudentDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_sd_id', 
        'fk_school_id', 
        'class', 
        'total_student', 
        'total_male_student', 
        'total_female_student', 
        'general', 
        'sc', 
        'st', 
        'obc', 
        'minority', 
        'bpl', 
        'tea_tribe', 
        'others', 
        'students_having_aadhaar_card', 
        'students_having_bank_account', 
        'pwd_cwsc', 
        'average_age', 
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by', 
        'is_deleted'
    ];


}