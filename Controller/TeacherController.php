<?php

declare(strict_types=1);

class TeacherController
{
    private Teacher $teacher;
    private Teacherloader $loader;

    public function render() // getTeacherData
    {
        if (!empty($_POST['teacher_name']) && !empty($_POST['teacher_email'])) {
               $this->teacher = new Teacher($_POST['teacher_name'], $_POST['teacher_email']);
            $this->teacher->insert();
        }
        $this->teacherData();
    }

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }

    public function teacherData()
    {
        $loader = new Teacherloader();
        $teachers = $loader->getTeachers();

        require 'View/TeacherView.php';
    }
}