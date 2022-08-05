<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSalaryAccountDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacehr_service_details_id',
        'fk_teacher_id',
        'pan_no',
        'account_no',
        'account_name',
        'bank_name',
        'branch_name',
        'ifsc',
        'district_name_of_active_salary_account_no',
        'state_name_of_active_salary_account_no',
        'salary_payment_mode',
        'gross_provoded_fund',
        'group_insurance_scheme',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        'deleted_by',
        'deleted_on',
        'is_deleted'
    ];


}
