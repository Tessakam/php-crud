<?php

declare(strict_types=1);

class ClassroomController
{
    private Classroom $classroom;
    private ClassroomLoader $loader;

    public function render() //getClassData
    {
        $this->loader = new ClassroomLoader();

        if (!empty($_POST['class_name']) && !empty($_POST['class_location'])) {
            $this->classroom = new Classroom($_POST['class_name'], $_POST['class_location']);
            $this->classroom->insertData();
        }
        $this->classroomData();
    }


    public function getClassroom(): Classroom
    {
        return $this->classroom;
    }


    public function classroomData()
    {
        $classes = $this->loader->getClasses();

        require 'View/class.php';
    }
}
