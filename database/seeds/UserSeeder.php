<?php

use App\User;
use App\Admin;
use App\Family;
use App\Student;
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
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' =>  Hash::make('password'),
            'role' => 'Admin',
        ]);
        
        $user = new User();
        $user->name = 'Employee1';
        $user->sex = 'M';
        $user->dob = Carbon::create('1999', '04', '15');
        $user->employee_id = '2018-00001-CL-0';
        $user->email = 'employee1@test.com';
        $user->password = Hash::make('password');
        $user->role = 'Teacher';
        $user->department = 'College';
        $user->image = '';

        $user->save();

        $user->family()->create([
            'user_id' => $user->id,
            'family_name' => $user->name,
        ]);

        $user->education()->create([
            'user_id' => $user->id,
            'name' => $user->name,
            'elementary' => null,
            'secondary' => null,
            'college' => null,
            'graduate_study' => null
        ]);
        
    }
}
