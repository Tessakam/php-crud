<?php

declare(strict_types=1);
require 'Model/Database.php';
require 'Model/Classroom.php';
require 'Model/ClassroomLoader.php';

class ClassroomController
{
    private Classroom $classroom;

    public function render() //getClassData
    {
        $pdo = Database::openConnection();

        if (!empty($_POST['class_name']) && !empty($_POST['class_location'])) {
            $this->classroom = new Classroom($_POST['class_name'], $_POST['class_location']);
            $this->classroom->insertData();
        }
        require 'View/homepage.php';
    }


    public function getClassroom(): Classroom
    {
        return $this->classroom;
    }


    public function classroomData()
    {
        $classroomLoader = new ClassroomLoader();
        $classes = $classroomLoader->getClasses();

        require 'View/class.php';
    }
}
