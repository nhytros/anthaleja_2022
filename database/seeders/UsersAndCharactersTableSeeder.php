<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\{User, Character};

class UsersAndCharactersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@anthaleja.ovh',
            'password' => bcrypt('password', ['rounds' => 12]),
            'status' => true,
        ]);
        $admin->assignRole('admin');
        $admin->givePermissionTo('user');
        $admin->givePermissionTo('character');

        $gov = User::create([
            'username' => 'jjnhytros',
            'email' => 'jjnhytros@anthaleja.ovh',
            'password' => bcrypt('password', ['rounds' => 12]),
            'status' => true,
        ]);
        $gov->assignRole('government');

        $ch_gov = Character::create([
            'user_id' => 2,
            'first_name' => 'Governor',
            'last_name' => 'J.J. Nhytros',
            'username' => 'jjnhytros',
            'gender' => 'M',
            'height' => '178',
            'bank_account' => 'ATH-06498767',
            'cash' => 0,
            'bank_amount' => 5e9,
            'metals' => 0,
            'has_phone' => true,
            'phone_no' => '649-8767',
        ]);

        for ($u = 3; $u <= 25; $u++) {
            $user = User::create([
                'id' => $u,
                'username' => $faker->unique()->username(),
                'email' => $faker->unique()->email(),
                'password' => bcrypt('password', ['rounds' => 12]),
                'status' => true,
            ]);
            $user->assignRole('user');

            $gender = $faker->randomElement(['M', 'F', 'O']);
            if ($gender == 'F') {
                $first_name = $faker->unique()->firstNameFemale();
                $height = $faker->numberBetween(140, 180);
            } elseif ($gender == 'M') {
                $first_name = $faker->unique()->firstNameMale();
                $height = $faker->numberBetween(150, 210);
            } else {
                $first_name = $faker->unique()->firstName();
                $height = $faker->numberBetween(140, 210);
            }

            $c = Character::create([
                'user_id' => $u,
                'first_name' => $first_name,
                'last_name' => $last_name = $faker->lastName(),
                'username' => strtolower($last_name . '.' . $first_name),
                'gender' => $gender,
                'height' => $height,
                'bank_account' => 'ATH-' . $faker->unique()->numberBetween(11111111, 33333333),
                'cash' => 0,
                'bank_amount' => 500,
                'metals' => 0,
                'has_phone' => true,
                'phone_no' => $faker->unique()->numerify('###-####'),
            ]);
        }
    }
}
