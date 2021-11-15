<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@health.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123.health'),
            ],
            [
               'name'=>'Facility',
               'email'=>'user@health.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123.him'),
            ],
            [
               'name'=>'Langata Facility',
               'email'=>'langata@health.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123.him'),
            ],
            [
               'name'=>'Rongai Facility',
               'email'=>'rongai@health.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123.him'),
            ],
            [
               'name'=>'Mbagathi Facility',
               'email'=>'mbagathi@health.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123.him'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
