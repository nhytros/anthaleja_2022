<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\School\Shift;
use App\Models\School\Section;
use Illuminate\Database\Seeder;
use App\Models\School\{Day, Level, Grade, Klass, Session, Subject, Time};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class School extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();


        // Levels
        Level::create(['name' => 'Nursery', 'description' => '0-3 years']);
        Level::create(['name' => 'Pre-School', 'description' => '4-5 years']);
        Level::create(['name' => 'Elementary', 'description' => '6-11 years']);
        Level::create(['name' => 'Primary Grade 1', 'description' => '12-16 years']);
        Level::create(['name' => 'Secondary Grade 2', 'description' => '17-19 years']);
        Level::create(['name' => 'College', 'description' => 'College']);

        // Grades
        Grade::create(['level_id' => 1, 'name' => 'Grade 1', 'description' => 'Nursery Grade 1']);
        Grade::create(['level_id' => 1, 'name' => 'Grade 2', 'description' => 'Nursery Grade 2']);
        Grade::create(['level_id' => 1, 'name' => 'Grade 3', 'description' => 'Nursery Grade 3']);
        Grade::create(['level_id' => 2, 'name' => 'Grade 1', 'description' => 'Pre-School Grade 1']);
        Grade::create(['level_id' => 2, 'name' => 'Grade 2', 'description' => 'Pre-School Grade 2']);
        Grade::create(['level_id' => 3, 'name' => 'Grade 1', 'description' => 'Elementary Grade 1']);
        Grade::create(['level_id' => 3, 'name' => 'Grade 2', 'description' => 'Elementary Grade 2']);
        Grade::create(['level_id' => 3, 'name' => 'Grade 3', 'description' => 'Elementary Grade 3']);
        Grade::create(['level_id' => 3, 'name' => 'Grade 4', 'description' => 'Elementary Grade 4']);
        Grade::create(['level_id' => 3, 'name' => 'Grade 5', 'description' => 'Elementary Grade 5']);
        Grade::create(['level_id' => 4, 'name' => 'Grade 1', 'description' => 'Primary Grade 1']);
        Grade::create(['level_id' => 4, 'name' => 'Grade 2', 'description' => 'Primary Grade 2']);
        Grade::create(['level_id' => 5, 'name' => 'Grade 1', 'description' => 'Secondary Grade 1']);
        Grade::create(['level_id' => 5, 'name' => 'Grade 2', 'description' => 'Secondary Grade 2']);
        Grade::create(['level_id' => 5, 'name' => 'Grade 3', 'description' => 'Secondary Grade 3']);
        Grade::create(['level_id' => 5, 'name' => 'Grade 4', 'description' => 'Secondary Grade 4']);
        Grade::create(['level_id' => 6, 'name' => 'Year 1', 'description' => 'College Year 1']);
        Grade::create(['level_id' => 6, 'name' => 'Year 2', 'description' => 'College Year 2']);
        Grade::create(['level_id' => 6, 'name' => 'Year 3', 'description' => 'College Year 3']);
        Grade::create(['level_id' => 6, 'name' => 'Year 4', 'description' => 'College Year 4']);

        Klass::create(['grade_id' => 1, 'code' => 'N1A', 'name' => 'Class A', 'description' => 'Nursery 1A']);
        Klass::create(['grade_id' => 1, 'code' => 'N1B', 'name' => 'Class B', 'description' => 'Nursery 1B']);
        Klass::create(['grade_id' => 2, 'code' => 'N2A', 'name' => 'Class A', 'description' => 'Nursery 2A']);
        Klass::create(['grade_id' => 2, 'code' => 'N2B', 'name' => 'Class B', 'description' => 'Nursery 2B']);
        Klass::create(['grade_id' => 3, 'code' => 'N3A', 'name' => 'Class A', 'description' => 'Nursery 3A']);
        Klass::create(['grade_id' => 3, 'code' => 'N3B', 'name' => 'Class B', 'description' => 'Nursery 3B']);
        Klass::create(['grade_id' => 4, 'code' => 'PS4A', 'name' => 'Class A', 'description' => 'Pre-School 4A']);
        Klass::create(['grade_id' => 4, 'code' => 'PS4B', 'name' => 'Class B', 'description' => 'Pre-School 4B']);
        Klass::create(['grade_id' => 5, 'code' => 'PS5A', 'name' => 'Class A', 'description' => 'Pre-School 5A']);
        Klass::create(['grade_id' => 5, 'code' => 'PS5B', 'name' => 'Class B', 'description' => 'Pre-School 5B']);
        Klass::create(['grade_id' => 6, 'code' => 'E1A', 'name' => 'Class A', 'description' => 'Elementary 1A']);
        Klass::create(['grade_id' => 6, 'code' => 'E1B', 'name' => 'Class B', 'description' => 'Elementary 1B']);
        Klass::create(['grade_id' => 6, 'code' => 'E1C', 'name' => 'Class C', 'description' => 'Elementary 1C']);
        Klass::create(['grade_id' => 6, 'code' => 'E1D', 'name' => 'Class D', 'description' => 'Elementary 1D']);
        Klass::create(['grade_id' => 7, 'code' => 'E2A', 'name' => 'Class A', 'description' => 'Elementary 2A']);
        Klass::create(['grade_id' => 7, 'code' => 'E2B', 'name' => 'Class B', 'description' => 'Elementary 2B']);
        Klass::create(['grade_id' => 7, 'code' => 'E2C', 'name' => 'Class C', 'description' => 'Elementary 2C']);
        Klass::create(['grade_id' => 7, 'code' => 'E2D', 'name' => 'Class D', 'description' => 'Elementary 2D']);
        Klass::create(['grade_id' => 8, 'code' => 'E3A', 'name' => 'Class A', 'description' => 'Elementary 3A']);
        Klass::create(['grade_id' => 8, 'code' => 'E3B', 'name' => 'Class B', 'description' => 'Elementary 3B']);
        Klass::create(['grade_id' => 8, 'code' => 'E3C', 'name' => 'Class C', 'description' => 'Elementary 3C']);
        Klass::create(['grade_id' => 8, 'code' => 'E3D', 'name' => 'Class D', 'description' => 'Elementary 3D']);
        Klass::create(['grade_id' => 9, 'code' => 'E4A', 'name' => 'Class A', 'description' => 'Elementary 4A']);
        Klass::create(['grade_id' => 9, 'code' => 'E4B', 'name' => 'Class B', 'description' => 'Elementary 4B']);
        Klass::create(['grade_id' => 9, 'code' => 'E4C', 'name' => 'Class C', 'description' => 'Elementary 4C']);
        Klass::create(['grade_id' => 9, 'code' => 'E4D', 'name' => 'Class D', 'description' => 'Elementary 4D']);
        Klass::create(['grade_id' => 10, 'code' => 'E5A', 'name' => 'Class A', 'description' => 'Elementary 5A']);
        Klass::create(['grade_id' => 10, 'code' => 'E5B', 'name' => 'Class B', 'description' => 'Elementary 5B']);
        Klass::create(['grade_id' => 10, 'code' => 'E5C', 'name' => 'Class C', 'description' => 'Elementary 5C']);
        Klass::create(['grade_id' => 10, 'code' => 'E5D', 'name' => 'Class D', 'description' => 'Elementary 5D']);
        Klass::create(['grade_id' => 11, 'code' => 'P1A', 'name' => 'Class A', 'description' => 'Primary 1A']);
        Klass::create(['grade_id' => 11, 'code' => 'P1B', 'name' => 'Class B', 'description' => 'Primary 1B']);
        Klass::create(['grade_id' => 12, 'code' => 'P2A', 'name' => 'Class A', 'description' => 'Primary 2A']);
        Klass::create(['grade_id' => 12, 'code' => 'P2B', 'name' => 'Class B', 'description' => 'Primary 2B']);
        Klass::create(['grade_id' => 12, 'code' => 'P2C', 'name' => 'Class C', 'description' => 'Primary 2C']);
        Klass::create(['grade_id' => 13, 'code' => 'P3A', 'name' => 'Class A', 'description' => 'Primary 3A']);
        Klass::create(['grade_id' => 13, 'code' => 'P3B', 'name' => 'Class B', 'description' => 'Primary 3B']);
        Klass::create(['grade_id' => 13, 'code' => 'P3C', 'name' => 'Class C', 'description' => 'Primary 3C']);
        Klass::create(['grade_id' => 13, 'code' => 'P4A', 'name' => 'Class A', 'description' => 'Primary 4A']);
        Klass::create(['grade_id' => 13, 'code' => 'P4B', 'name' => 'Class B', 'description' => 'Primary 4B']);
        Klass::create(['grade_id' => 13, 'code' => 'P4C', 'name' => 'Class C', 'description' => 'Primary 4B']);
        Klass::create(['grade_id' => 13, 'code' => 'P5A', 'name' => 'Class A', 'description' => 'Primary 5A']);
        Klass::create(['grade_id' => 13, 'code' => 'P5B', 'name' => 'Class B', 'description' => 'Primary 5B']);
        Klass::create(['grade_id' => 13, 'code' => 'P5C', 'name' => 'Class C', 'description' => 'Primary 5C']);

        Shift::create(['name' => 'Morning']);
        Shift::create(['name' => 'Evening']);
        Shift::create(['name' => 'Afternoon']);

        for ($s = 1; $s <= 24; $s++) {
            Subject::create([
                'name' => $faker->unique()->word(),
                'code' => $faker->unique()->ean8(),
                'credits' => $faker->numberBetween(1, 5),
                'hours' => $faker->numberBetween(1, 5),
                'assignment_percentage' => $ap = $faker->numberBetween(1, 50),
                'final_percentage' => 100 - $ap,
            ]);
        }

        Section::create(['name' => $name = 'A', 'code' => $name]);
        Section::create(['name' => $name = 'B', 'code' => $name]);
        Section::create(['name' => $name = 'K', 'code' => $name]);
        Section::create(['name' => $name = 'D', 'code' => $name]);
        Section::create(['name' => $name = 'E', 'code' => $name]);
        Section::create(['name' => $name = 'F', 'code' => $name]);
        Section::create(['name' => $name = 'I', 'code' => $name]);
        Section::create(['name' => $name = 'L', 'code' => $name]);
        Section::create(['name' => $name = 'M', 'code' => $name]);
        Section::create(['name' => $name = 'N', 'code' => $name]);
        Section::create(['name' => $name = 'O', 'code' => $name]);
        Section::create(['name' => $name = 'P', 'code' => $name]);
        Section::create(['name' => $name = 'R', 'code' => $name]);
        Section::create(['name' => $name = 'S', 'code' => $name]);
        Section::create(['name' => $name = 'X', 'code' => $name]);
        Section::create(['name' => $name = 'T', 'code' => $name]);
        Section::create(['name' => $name = 'U', 'code' => $name]);
        Section::create(['name' => $name = 'V', 'code' => $name]);
        Section::create(['name' => $name = 'Z', 'code' => $name]);

        // Time 1: 8:10-18:30 (50min/hour)
        Time::create(['shift_id' => 1, 'name' => '1st hour', 'code' => 'm1a', 'start' => '08:10', 'end' => '09:00']);
        Time::create(['shift_id' => 1, 'name' => '2nd hour', 'code' => 'm2a', 'start' => '09:00', 'end' => '09:50']);
        Time::create(['shift_id' => 1, 'name' => '3rd hour', 'code' => 'm3a', 'start' => '09:50', 'end' => '10:40']);
        Time::create(['shift_id' => 1, 'name' => '1st Break', 'code' => 'mba1', 'start' => '10:40', 'end' => '10:50']);
        Time::create(['shift_id' => 1, 'name' => '4th hour', 'code' => 'm4a', 'start' => '10:50', 'end' => '11:40']);
        Time::create(['shift_id' => 1, 'name' => '5th hour', 'code' => 'm5a', 'start' => '11:40', 'end' => '12:30']);
        Time::create(['shift_id' => 1, 'name' => '6th hour', 'code' => 'm6a', 'start' => '12:30', 'end' => '13:20']);
        Time::create(['shift_id' => 1, 'name' => '7th hour', 'code' => 'm7a', 'start' => '13:20', 'end' => '14:10']);
        Time::create(['shift_id' => 1, 'name' => '8th hour', 'code' => 'm8a', 'start' => '14:10', 'end' => '15:00']);
        Time::create(['shift_id' => 1, 'name' => '2nd Break', 'code' => 'mba2', 'start' => '15:00', 'end' => '16:00']);
        Time::create(['shift_id' => 2, 'name' => '9th hour', 'code' => 'm9a', 'start' => '16:00', 'end' => '16:50']);
        Time::create(['shift_id' => 2, 'name' => '10th hour', 'code' => 'm10a', 'start' => '16:50', 'end' => '17:40']);
        Time::create(['shift_id' => 2, 'name' => '11th hour', 'code' => 'm11a', 'start' => '17:40', 'end' => '18:30']);

        // Time 2: 8:30-15:30 (60min/hour
        Time::create(['shift_id' => 1, 'name' => '1st hour', 'code' => 'm1b', 'start' => '08:30', 'end' => '09:30']);
        Time::create(['shift_id' => 1, 'name' => '2nd hour', 'code' => 'm2b', 'start' => '09:30', 'end' => '10:30']);
        Time::create(['shift_id' => 1, 'name' => '3rd hour', 'code' => 'm3b', 'start' => '10:30', 'end' => '11:30']);
        Time::create(['shift_id' => 1, 'name' => '4th hour', 'code' => 'm4b', 'start' => '11:30', 'end' => '12:30']);
        Time::create(['shift_id' => 1, 'name' => '5th hour', 'code' => 'm5b', 'start' => '12:30', 'end' => '14:30']);
        Time::create(['shift_id' => 1, 'name' => '6th hour', 'code' => 'm6b', 'start' => '14:30', 'end' => '15:30']);

        // Time 3: Afternoon
        Time::create(['shift_id' => 3, 'name' => 'Afternoon 1', 'code' => 'afternoon-1', 'start' => '20:00', 'end' => '24:00']);
        Time::create(['shift_id' => 3, 'name' => 'Afternoon 2', 'code' => 'afternoon-2', 'start' => '21:00', 'end' => '25:00']);
        Time::create(['shift_id' => 3, 'name' => 'Afternoon 3', 'code' => 'afternoon-3', 'start' => '22:00', 'end' => '26:00']);

        Day::create(['name' => 'Majahr']);
        Day::create(['name' => 'Bejahr']);
        Day::create(['name' => 'Ĉejahr']);
        Day::create(['name' => 'Dyjahr']);
        Day::create(['name' => 'Fejahr']);
        Day::create(['name' => 'Ĝejahr']);

        Session::create(['name' => '1 Pentamester', 'code' => '5791/5792', 'current_session' => 1]);
        Session::create(['name' => '2 Pentamester', 'code' => '5791/5792', 'current_session' => 0]);
        Session::create(['name' => '3 Pentamester', 'code' => '5791/5792', 'current_session' => 0]);
    }
}
