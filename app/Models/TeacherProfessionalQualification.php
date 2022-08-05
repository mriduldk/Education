<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherProfessionalQualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacehr_academic_qualification_id',
        'fk_teacher_id',
        'qualification',
        'mode',
        'status',
        'subjects_studied',
        'board_university',
        'school_college',
        'passing_year',
        'roll_no',
        'marks_obtained',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        'deleted_by',
        'deleted_on',
        'is_deleted'
    ];

}

