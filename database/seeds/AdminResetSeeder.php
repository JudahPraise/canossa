<?php

use Illuminate\Database\Seeder;

class AdminResetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Password Reseter',
            'employee_id' => '10',
            'admin_id' => 'CADM-210922-05',
            'dep_pos' => 'Emergency Account',
            'desc_id' => '7',
            'user_id' => '10',
            'password' => Hash::make('password')
        ]);
    }
}
