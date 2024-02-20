<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use PharIo\Manifest\Email;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $users = [
            [
                'name' => 'Persona1',
                'email' => 'persona1@gmail.com',
                'password' => '12345678',
            ],
            [
                'name' => 'Persona2',
                'email' => 'persona2@gmail.com',
                'password' => '12345678',
            ]

        ];
        foreach ($users as $user) {
            $newUsers = new User();
            $newUsers->name = $user['name'];
            $newUsers->email = $user['email'];
            $newUsers->password = $user['password'];
            $newUsers->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $newUsers = new User();
            $newUsers->name = $faker->name();
            $newUsers->email = $faker->email();
            $newUsers->password = $faker->password();
            $newUsers->save();
        }
    }
}
