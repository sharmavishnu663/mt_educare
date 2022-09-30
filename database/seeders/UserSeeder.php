<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Vishnu Sharma',
                'email' => 'vishnu.sharma@gmail.com',
                'password' => bcrypt('111111'),
            ]
        ];

        foreach ($admins as $admin) {
            User::create($admin);
        }
    }
}
