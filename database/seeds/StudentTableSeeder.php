<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $s1 = new Student;

        // $s1->name="Mg Mg";
        // $s1->email="mgmg@gmail.com";
        // $s1->address="Magway";
        // $s1->save();

        // $s2 = new Student;
        // $s2->name="Su Su";
        // $s2->email="susu@gmail.com";
        // $s2->address="Yangon";
        // $s2->save();
        factory(App\Student::class,10)->create();
    }
}
