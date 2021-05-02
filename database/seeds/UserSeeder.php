<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use App\Student;
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
        
        User::create([
            'fname' => 'Employee1',
            'mname' => 'T',
            'lname' => 'Sample',
            'sex' => 'Male',
            'employee_id' => '2018-00001-CL-0',
            'email' => 'employee1@test.com',
            'password' =>  Hash::make('password'),
            'role' => 'Teacher',
            'department' => 'College',
            'image' => ''
        ]);

        User::create([
            'fname' => 'Employee2',
            'mname' => 'S',
            'lname' => 'Example',
            'sex' => 'Male',
            'employee_id' => '2018-00001-CL-0',
            'email' => 'employee2@test.com',
            'password' =>  Hash::make('password'),
            'role' => 'Teacher',
            'department' => 'Secondary',
            'image' => ''
        ]);

        User::create([
            'fname' => 'Employee3',
            'mname' => 'Y',
            'lname' => 'Test',
            'sex' => 'Male',
            'employee_id' => '2018-00001-CL-0',
            'email' => 'employee3@test.com',
            'password' =>  Hash::make('password'),
            'role' => 'Staff',
            'department' => '',
            'image' => ''
        ]);


        Student::create([
            'name' => 'Student',
            'email' => 'student@test.com',
            'password' =>  Hash::make('password'),
        ]);
    }
}
