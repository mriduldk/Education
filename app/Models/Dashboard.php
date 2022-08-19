<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Dashboard extends Model
{
    
    public $is;
    public $dpc;
    public $dmc;
    public $deeo;
    public $approver;
    public $manager;
    public $deo;
    public $school;
    public $teacher;


}