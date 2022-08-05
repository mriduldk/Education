<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id', 
        'school_name', 
        'udice_code', 
        'village', 
        'cluster', 
        'block', 
        'district', 
        'state', 
        'pin', 
        'class_from', 
        'class_to', 
        'school_type', 
        'school_category', 
        'state_management', 
        'national_management', 
        'status', 
        'location', 
        'aff_board_sec', 
        'add_board_h_sec', 
        'year_of_establishment', 
        'pre_primary', 
        'class_rooms', 
        'other_rooms', 
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by', 
        'is_deleted'
    ];



}
