<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $userIds = User::all()->pluck('id');


        foreach ($userIds as $userId) {
            $userProfile = new UserProfile();
            $userProfile->user_id = $userId;
            $userProfile->date_of_birth = $faker->date();
            $userProfile->user_photo = $faker->imageUrl();
            $userProfile->phone_number = $faker->randomNumber(9, true);
            $userProfile->save();
        }
    }
}
