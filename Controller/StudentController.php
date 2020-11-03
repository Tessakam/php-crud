<?php

declare(strict_types=1);

class StudentController
{
    private Student $student;
    private StudentLoader $loader;

    public function render() // getStudentData
    {
        if (!empty($_POST['student_name']) && !empty($_POST['student_email'])) {
            $this->student = new Student($_POST['student_name'], $_POST['student_email']);
            $this->student->insert();

        } $this->studentData();
    }

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function studentData()
    {
        $loader = new StudentLoader();
        $students = $loader->getStudents();

        require 'View/studentView.php';
    }
}