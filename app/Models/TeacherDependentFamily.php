<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherDependentFamily extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'teacher_dependent_family_id',
        'fk_teacher_id',
        'name',
        'dob',
        'gender',
        'relationship',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        'deleted_by',
        'deleted_on',
        'is_deleted'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];


}
