<?php

namespace Database\Seeders;

use App\Models\Backend\AcademicClass;
use App\Models\Backend\Classes;
use App\Models\Backend\Group;
use App\Models\Backend\Section;
use App\Models\Backend\Session;
use Illuminate\Database\Seeder;

class AcademicClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $classes = array(
            array('id' => '1','name' => 'One','numeric_class' => '1','grade_id' => NULL,'created_at' => '2022-01-12 15:32:34','updated_at' => '2022-01-12 15:33:16'),
            array('id' => '3','name' => 'Two','numeric_class' => '2','grade_id' => NULL,'created_at' => '2022-01-12 15:33:23','updated_at' => '2022-01-12 15:33:23'),
            array('id' => '4','name' => 'Ten','numeric_class' => '10','grade_id' => NULL,'created_at' => '2022-02-14 12:11:14','updated_at' => '2022-02-14 12:11:14')
        );

        Classes::insert($classes);

        $groups = array(
            array('id' => '1','name' => 'Science','created_at' => '2022-03-31 13:13:36','updated_at' => '2022-03-31 13:13:36'),
            array('id' => '2','name' => 'Commerce','created_at' => '2022-03-31 13:13:36','updated_at' => '2022-03-31 13:13:36'),
            array('id' => '3','name' => 'Humanities','created_at' => '2022-03-31 13:13:37','updated_at' => '2022-03-31 13:13:37')
        );

        Group::insert($groups);

        $sessions = array(
            array('id' => '1','year' => '2017-2019','start' => '2022-01-06','end' => '2022-01-04','description' => NULL,'active' => '1','created_at' => '2022-01-12 15:33:58','updated_at' => '2022-04-19 13:11:08'),
            array('id' => '2','year' => '2020-2022','start' => '2022-01-04','end' => '2022-01-04','description' => NULL,'active' => '1','created_at' => '2022-02-12 12:47:28','updated_at' => '2022-04-19 13:11:16'),
            array('id' => '3','year' => '2011-2013','start' => '2022-02-17','end' => '2022-02-18','description' => 'Quae aspernatur ut m','active' => '0','created_at' => '2022-02-14 12:05:04','updated_at' => '2022-02-14 12:08:46'),
            array('id' => '4','year' => '2020-2022','start' => '2022-02-12','end' => '2022-02-12','description' => NULL,'active' => '0','created_at' => '2022-02-14 12:07:21','updated_at' => '2022-02-14 12:07:21'),
            array('id' => '5','year' => '2011-20222','start' => '2022-02-12','end' => '2022-02-19','description' => NULL,'active' => '0','created_at' => '2022-02-14 12:08:08','updated_at' => '2022-02-14 12:08:08')
        );
        Session::insert($sessions);

        $sections = array(
            array('id' => '1','name' => 'A','created_at' => '2022-01-12 15:33:31','updated_at' => '2022-01-12 15:55:42'),
            array('id' => '2','name' => 'B','created_at' => '2022-01-17 12:39:11','updated_at' => '2022-01-17 12:39:11')
        );
        Section::insert($sections);

        $academic_classes = array(
            array('id' => '8','session_id' => '1','class_id' => '4','section_id' => NULL,'group_id' => '1','created_at' => '2022-02-15 11:29:29','updated_at' => '2022-04-02 13:23:21'),
            array('id' => '9','session_id' => '1','class_id' => '4','section_id' => NULL,'group_id' => '2','created_at' => '2022-02-15 11:33:02','updated_at' => '2022-04-02 13:23:26'),
            array('id' => '11','session_id' => '1','class_id' => '1','section_id' => NULL,'group_id' => '6','created_at' => '2022-02-15 11:33:44','updated_at' => '2022-02-15 11:33:44'),
            array('id' => '12','session_id' => '1','class_id' => '3','section_id' => NULL,'group_id' => NULL,'created_at' => '2022-02-24 11:25:32','updated_at' => '2022-02-24 11:25:32'),
            array('id' => '14','session_id' => '1','class_id' => '1','section_id' => NULL,'group_id' => '7','created_at' => '2022-03-07 13:55:17','updated_at' => '2022-03-07 13:55:17'),
            array('id' => '15','session_id' => '1','class_id' => '1','section_id' => NULL,'group_id' => NULL,'created_at' => '2022-03-20 13:06:07','updated_at' => '2022-03-20 13:06:07'),
            array('id' => '16','session_id' => '2','class_id' => '1','section_id' => NULL,'group_id' => NULL,'created_at' => '2022-03-20 17:06:00','updated_at' => '2022-03-20 17:06:00'),
            array('id' => '17','session_id' => '1','class_id' => '1','section_id' => NULL,'group_id' => '8','created_at' => '2022-03-20 17:07:19','updated_at' => '2022-03-20 17:07:19'),
            array('id' => '18','session_id' => '2','class_id' => '4','section_id' => NULL,'group_id' => '3','created_at' => '2022-04-02 13:23:47','updated_at' => '2022-04-02 13:23:47')
        );
        AcademicClass::insert($academic_classes);

    }
}
