<?php

declare(strict_types=1);
//flow structure could be better by adding private class and adding require in render.

class ClassroomController
{
    private Classroom $classroom;
    private ClassroomLoader $loader;

    public function render() //getClassData
    {
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
        $loader = new ClassroomLoader(); // makes connection with db
        $classes = $loader->getClasses();

        require 'View/class.php'; // leave the require in class, otherwise undefined classes
    }
}