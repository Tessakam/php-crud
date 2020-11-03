<?php

declare(strict_types=1);
require 'Model/Database.php';
require 'Model/Teacher.php';
require 'Model/Teacherloader.php';

class TeacherController
{
    private Teacher $teacher;

    public function render() // getTeacherData
    {
        $pdo = $this->openConnection();

            if (!empty($_POST['teacher_name']) && !empty($_POST['teacher_email'])) {
            $controller = new ClassroomController();
            $controller->getClassData();
            $this->teacher = new Teacher($_POST['teacher_name'], $_POST['teacher_email'], $controller->getClassroom());
            $this->teacher->insert();
        }
        require 'View/homepage.php';
    }

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }
}