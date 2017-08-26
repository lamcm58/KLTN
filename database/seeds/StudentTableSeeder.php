<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $student = new Student();
            $student->username = $faker->userName;
            $student->password = bcrypt('123456');
            $student->student_code = str_random(8);
            $student->class = $faker->company;
            $student->email = $faker->email;
            $student->full_name = $faker->firstName . ' ' . $faker->lastName;

            $student->save();
        }
    }
}
