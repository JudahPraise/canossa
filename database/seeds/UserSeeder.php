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
            'name' => 'Employee1',
            'sex' => 'Male',
            'employee_id' => '2018-00001-CL-0',
            'email' => 'employee1@test.com',
            'password' =>  Hash::make('password'),
            'role' => 'Teacher',
            'department' => 'College',
            'image' => ''
        ]);

        User::create([
            'name' => 'Employee2',
            'sex' => 'Male',
            'employee_id' => '2018-00001-CL-0',
            'email' => 'employee2@test.com',
            'password' =>  Hash::make('password'),
            'role' => 'Teacher',
            'department' => 'Secondary',
            'image' => ''
        ]);

        User::create([
            'name' => 'Employee3',
            'sex' => 'Male',
            'employee_id' => '2018-00001-CL-0',
            'email' => 'employee3@test.com',
            'password' =>  Hash::make('password'),
            'role' => 'Staff',
            'department' => '',
            'image' => ''
        ]);

    }
}
