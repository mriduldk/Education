<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherServiceDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacehr_service_details_id',
        'fk_teacher_id',
        'post_name',
        'medium_of_school',
        'subjects',
        'pay_scale',
        'appointment_latter_no',
        'appointment_date',
        'post_creation_no',
        'post_creation_date',
        'date_of_effect_of_service_provincialisation',
        'date_of_joining_in_service',
        'date_of_joining_in_present_post',
        'date_of_retirement',
        'period_spent_on_non_teaching_assignment',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        'deleted_by',
        'deleted_on',
        'is_deleted'
    ];

}