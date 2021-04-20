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
            'name' => 'Employee',
            'email' => 'employee@test.com',
            'password' => Hash::make('password'),
            'role' => 'Teacher',
        ]);


        Student::create([
            'name' => 'Student',
            'email' => 'student@test.com',
            'password' =>  Hash::make('password'),
        ]);
    }
}
