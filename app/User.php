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
    ['for_emp_id','fname', 'mname', 'sname', 'extname', 'sex', 'dob', 'employee_id', 'email', 'password', 'role', 'department', 'image'];


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


    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class, 'user_id')->latest();
    }

    public function illness()
    {
        return $this->hasOne(PersonalHistory::class, 'user_id')->latest();
    }

    public function documents(){
        return $this->hasMany(Document::class);
    }

    public function labTest(){
        return $this->hasOne(LabTest::class)->latest();
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

}
