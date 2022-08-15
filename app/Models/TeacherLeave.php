<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherLeave extends Model
{
    use HasFactory;

    protected $fillable = [
        'leave_application_no',
        'teacher_leave_id',
        'fk_teacher_id',
        'fk_school_id',
        'fk_head_teacher_id',
        'leave_date_from',
        'leave_date_to',
        'leave_subject',
        'leave_message',
        'leave_application_image',
        'is_only_uploaded_application',
        'status',
        'remarks',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        'deleted_on',
        'deleted_by',
        'is_active',
        'is_deleted'
    ];


}
