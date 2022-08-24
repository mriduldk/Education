<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_status_id',
        'fk_teacher_id',
        'status',
        'attachement_date',
        'block_name',
        'school_name',
        'udice_code',
        'is_active',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        'deleted_by',
        'deleted_on',
        'is_deleted'
    ];

}