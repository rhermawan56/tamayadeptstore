<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Member;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(1)->create();
        Member::create([
            'name' => 'Yoda',
            'address' => 'Bandung, Jawa Barat',
            'phone' => '085256641908',
            'status' => 'member'
        ]);

        Employee::create([
            'nip' => '21.22.23001',
            'name' => 'Rizky Hermawan',
            'address' => 'Cicalengka, Bandung Jawa Barat',
            'gender' => 'L',
            'role' => 'IT Programmer'
        ]);

        User::create([
            'employee_id' => 1,
            'email' => 'rizky@gmail.com',
            'password' => bcrypt('superadmin'),
            'email_verified_at' => now(),
            'type'=>'superadmin'
        ]);

        User::create([
            'member_id' => 1,
            'email' => 'yoda@gmail.com',
            'password' => bcrypt('member'),
            'email_verified_at' => now(),
            'type'=>'member'
        ]);
    }
}
