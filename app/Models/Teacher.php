<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //use HasFactory;


    //protected $guard = 'teacher';

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'teacher_id', 
        'fk_school_id', 
        'teacher_employee_code', 
        'teacher_first_name', 
        'teacher_last_name', 
        'teacher_gender', 
        'teacher_dob', 
        'teacher_caste', 
        'teacher_religion', 
        'teacher_nationality', 
        'teacher_present_address', 
        'teacher_parmanent_address', 
        'teacher_aadhaar_no', 
        'teacher_mobile', 
        'teacher_email', 
        'teacher_mother_name', 
        'teacher_father_name', 
        'teacher_identification_mark', 
        'teacher_blood_group', 
        'teacher_differntly_abled', 
        'teacher_maritial_status', 
        'teacher_spouse_name', 
        'teacher_spouse_working_under_govt_serveice', 
        'teacher_language', 
        'teacher_tet_category', 
        'teacher_category_type', 
        'teacher_image_url', 
        'is_head_teacher', 
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by', 
        'is_active', 
        'is_deleted'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'teacher_password'
    ];

}
