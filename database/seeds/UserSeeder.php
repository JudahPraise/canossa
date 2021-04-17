<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' =>  Hash::make('password'),
            'role' => 'Admin',
        ]);
        
        User::create([
            'name' => 'Employee',
            'email' => 'employee@test.com',
            'password' => Hash::make('password'),
            'role' => 'Employee',
        ]);


        User::create([
            'name' => 'Student',
            'email' => 'student@test.com',
            'password' =>  Hash::make('password'),
            'role' => 'Student',
        ]);
    }
}
