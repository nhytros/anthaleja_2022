<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use App\Models\Natter\Channel;
use App\Models\School\Student;
use App\Models\School\Teacher;
use Illuminate\Database\Seeder;
use App\Models\{User, Character};

class Users_and_Characters extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $isStudent = false;
        $isTeacher = false;

        $this->command->getOutput()->writeln("<info>Creating Admin User...</info>");
        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@anthaleja.ovh',
            'password' => bcrypt('password', ['rounds' => 12]),
            'status' => true,
        ]);
        $admin->assignRole('admin');
        $admin->givePermissionTo('user');
        $admin->givePermissionTo('character');
        $admin->givePermissionTo('school');
        $admin->givePermissionTo('hospital');

        $this->command->getOutput()->writeln("<info>Creating Governor User...</info>");
        $gov = User::create([
            'username' => 'jjnhytros',
            'email' => 'jjnhytros@anthaleja.ovh',
            'password' => bcrypt('password', ['rounds' => 12]),
            'status' => true,
        ]);
        $gov->assignRole('governor');

        $this->command->getOutput()->writeln("<info>Creating Governor Character...</info>");
        $ch_gov = Character::create([
            'user_id' => 2,
            'first_name' => 'Jerome',
            'last_name' => 'Nhytros',
            'username' => 'jjnhytros',
            'gender' => 'M',
            'height' => '178',
            'date_of_birth' => '1973-09-24',
            'bank_account' => 'ATH-06498767',
            'cash' => 0,
            'bank_amount' => 5e9,
            'metals' => 0,
            'has_phone' => true,
            'phone_no' => '649-8767',
        ]);
        Channel::create([
            'character_id' => $ch_gov->id,
            'name' => 'Government Channel',
            'slug' => 'government-channel',
            'uid' => $faker->unique()->ean13(),
            'description' => $faker->paragraphs(2, true),
            'image_avatar' => $faker->imageUrl(256, 256, null, true, $ch_gov->username, false, 'png'),
            'image_banner' => $faker->imageUrl(1920, 400, null, true, $ch_gov->username, false, 'png'),
        ]);

        $nu = 25;
        $this->command->getOutput()->writeln("<info>Generating {$nu} Users...</info>");
        for ($u = 3; $u <= $nu; $u++) {
            $user = User::create([
                'id' => $u,
                'username' => $faker->unique()->username(),
                'email' => $faker->unique()->email(),
                'password' => bcrypt('password', ['rounds' => 12]),
                'status' => true,
            ]);
            $user->assignRole('user');

            if ($faker->boolean(5)) {
                $user->assignRole('teacher');
                $isTeacher = true;
            }
            if ($faker->boolean(25)) {
                $user->assignRole('student');
                $isStudent = true;
            }
            if ($isStudent && $isTeacher) {
                $user->removeRole($faker->randomElement(['teacher', 'student']));
            }
            if ($user->doesntHave('roles')) {
                if ($faker->boolean(5)) {
                    $user->assignRole('doctor');
                    $isDoctor = true;
                }
            };
            if ($user->doesntHave('roles')) {
                if ($faker->boolean(5)) {
                    $user->assignRole('nurse');
                    $isNurse = true;
                }
            };
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

            $this->command->getOutput()->writeln("<info>Generating Character #" . $u . "</info>");
            $c = Character::create([
                'user_id' => $u,
                'first_name' => $first_name,
                'last_name' => $last_name = $faker->lastName(),
                'username' => $username = strtolower($last_name . '.' . $first_name),
                'gender' => $gender,
                'height' => $height,
                'date_of_birth' => $faker->dateTimeBetween('-50 years', '-18 years'),
                'bank_account' => 'ATH-' . $faker->unique()->numberBetween(11111111, 33333333),
                'cash' => 0,
                'bank_amount' => 500,
                'metals' => 0,
                'has_phone' => true,
                'phone_no' => $faker->unique()->numerify('###-####'),
            ]);
            $this->command->getOutput()->writeln("<info>Creating Channel for Character #" . $u . "</info>");
            Channel::create([
                'character_id' => $c->id,
                'name' => $name = $username . ' Channel',
                'description' => 'This is my channel',
                'uid' => $uid = $faker->unique()->ean13(),
                'slug' => Str::slug($name),
                'image_avatar' => $faker->imageUrl(256, 256, null, true, $c->username, false, 'png'),
                'image_banner' => $faker->imageUrl(1920, 400, null, true, $c->username, false, 'png'),
            ]);
            if ($isStudent) {
                Student::create([
                    'character_id' => $c->id,
                    'roll_no' => $faker->unique()->numberBetween(1, 2147483647),
                    'standard' => $faker->numberBetween(1, 5),
                ]);
            }
            if ($isTeacher) {
                Teacher::create([
                    'character_id' => $c->id,
                    'standard' => $faker->numberBetween(1, 5),
                ]);
            }
        }
    }
}
