<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFacilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_facility_id', 
        'fk_school_id', 
        'building_status', 
        'coundary_wall', 
        'no_of_boys_toilets', 
        'no_of_girls_toilets', 
        'no_of_cwsn_toilets', 
        'drinking_water_availability', 
        'hand_wash_facility', 
        'functional_generator', 
        'library', 
        'reading_corner', 
        'book_bank', 
        'functional_laptop', 
        'functional_desktop', 
        'functional_tablet', 
        'functional_scanner', 
        'functional_printer', 
        'functional_led', 
        'functional_digiboard', 
        'internet', 
        'dth', 
        'functional_web_cam', 
        'created_on', 
        'created_by', 
        'modified_on', 
        'modified_by', 
        'deleted_on', 
        'deleted_by', 
        'is_deleted'
    ];


}
