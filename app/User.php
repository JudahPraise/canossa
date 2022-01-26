<?php

namespace App;

use App\Family;
use App\Illness;
use App\LabTest;
use App\Document;
use App\Feedback;
use App\Schedule;
use App\Diagnosis;
use App\HealthProblem;
use App\PersonalHistory;
use App\PersonalInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    ['for_emp_id','fname', 'mname', 'lname', 'extname', 'sex', 'dob', 'employee_id', 'password', 'role', 'department', 'image','category',
    'qr_token'];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function documents(){
        return $this->hasMany(Document::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }

    public function personal()
    {
        return $this->hasOne(PersonalInformation::class);
    }

    public function setFamily()
    {
        return $this->hasOne(Family::class);
    }
    
    public function family()
    {
        return $this->hasOne(Family::class, 'user_id');
    }

    public function experiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function education()
    {
        return $this->hasOne(EducationalBackground::class);
    }

    public function trainings()
    {
        return $this->hasMany(TrainingProgram::class);
    }

    public function voluntary_works()
    {
        return $this->hasMany(VoluntaryWork::class);
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'user_id');
    }

    public function records()
    {
        return $this->hasOne(MedicalRecord::class);
    }

    public function getAge() {
        $format = '%y years, %m months';

        if(!empty($this->dob))
        {
            return \Carbon\Carbon::parse($this->dob)->diff(\Carbon\Carbon::now())->format($format);
        }else
        {
            return 'null';
        }
    }

    public function fullName()
    {
        if($this->extname === null){
            return $this->lname.','.' '.$this->fname.','.' '.$this->mname;
        }

        return $this->lname.','.' '.$this->fname.','.' '.$this->mname.' '.$this->extname.'.';
    }

    public function shortName()
    {
        if($this->extname === null){
            return $this->lname.','.' '.$this->fname;
        }

        return $this->lname.','.' '.$this->fname;
    }

    public function height()
    { 
        if(!empty($this->personal->height))
        {
            return $this->personal->height.' '."ft";
        }else
        {
            return 'not set';
        }
    }

    public function weight()
    {
        if(!empty($this->personal->weight))
        {
            return $this->personal->weight.' '."kl";
        }else
        {
            return 'not set';
        }
    }

    public function bloodType()
    {
        if(!empty($this->personal->blood_type))
        {
            return $this->personal->blood_type;
        }else
        {
            return 'not set';
        }
    }

}
