<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_t_id',
        'fk_teacher_id',
        'fk_old_school_id',
        'fk_new_school_id',
        'transfer_date',
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