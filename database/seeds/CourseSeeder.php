<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'acronym' => 'BS Psych',
            'course_title' => 'Bachelor of Science in Psychology',
            'major' => '',
            'description' => 'A bachelor of arts or a bachelor of science in psychology trains students in foundational psychological theories and practices, human behavior, mental health conditions, and cognitive processes.'  
        ]);
        Course::create([
            'acronym' => 'BSN',
            'course_title' => 'Bachelor of Science in Nursing',
            'major' => '',
            'description' => 'A four-year degree program that teaches students the necessary skills and knowledge for health care.'  
        ]);
        Course::create([
            'acronym' => 'BSEd',
            'course_title' => 'Bachelor of Secondary Education',
            'description' => 'A bachelor of arts or a bachelor of science in psychology trains students in foundational psychological theories and practices, human behavior, mental health conditions, and cognitive processes.'  
        ]);
        
    }
}
