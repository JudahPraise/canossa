<?php

use App\User;
use App\Admin;
use App\Family;
use App\Student;
use App\AdminDescription;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $user = new User();
        $user->employee_id = 'CEMP-210922-01';
        $user->fname = 'Employee';
        $user->lname = 'Sample';
        $user->mname = 'D.';
        $user->extname = 'JR';
        $user->sex = 'M';
        $user->dob = Carbon::create('1999', '04', '15');
        $user->password = Hash::make('password');
        $user->role = 'Teacher';
        $user->department = 'College';
        $user->image = 'default-male.svg';
        $user->category = "Regular";
        $user->qr_token = "q0m59krrf9nm92wzinbuek";

        $user->save();

        $user->education()->create([
            'user_id' => $user->id,
            'name' => $user->fullName(),
            'elementary' => null,
            'secondary' => null,
            'college' => null,
            'graduate_study' => null
        ]);

        $user->setFamily()->create([
            'user_id' => $user->id,
            'family_name' => $user->fullName(),
        ]);

        // $now = Carbon::now()->format('Y');
        // $nextYear = Carbon::now()->addYear()->format('Y');

        $user->records()->create([
            'user_id' => $user->id,
        ]);

        AdminDescription::create([
            'description' => 'Director',
        ]);
        AdminDescription::create([
            'description' => 'Data Officer',
        ]);
        AdminDescription::create([
            'description' => 'IT Administrator',
        ]);
        AdminDescription::create([
            'description' => 'School Nurse',
        ]);
        AdminDescription::create([
            'description' => 'Human Resource',
            'admin_id' => 'CADM-210922-05'
        ]);

        Admin::create([
            'name' => $user->fullName(),
            'employee_id' => $user->employee_id,
            'admin_id' => 'CADM-210922-05',
            'dep_pos' => 'Human Resource',
            'desc_id' => '6',
            'user_id' => $user->id,
            'password' => Hash::make('password')
        ]);
        
    }
}
