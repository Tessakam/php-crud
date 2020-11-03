<?php


class StudentController
{

    public function getStudentData() {
        if (!empty($_POST['student_name']) && !empty($_POST['student_email'])) {
            $controller = new TeacherController();
            $controller->getTeacherData();
            $student = new Student($_POST['student_name'], $_POST['student_email'], $controller->getTeacher());
            $student->insert();
        }

        require 'View/homepage.php';
    }

    public function studentData() {
        $loader = new StudentLoader();
        $students = $loader->getStudents();

        require 'View/studentView.php';
    }
}