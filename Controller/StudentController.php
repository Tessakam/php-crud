<?php

declare(strict_types=1);
class StudentController
{
    public function render() {
        $database = new Database();
        $teacherArray = $database->displayTeachers();
        $studentArray = $database->displayStudents();
        $classArray = $database->displayClasses();
        $students = [];
        $classes = [];
        foreach ($classArray as $class) {
            foreach ($teacherArray as $teacher) {
                if ($teacher['class_id'] == $class['id']) {
                    $class += ['teacher_name' => $teacher['name'], 'teacher_email' => $teacher['email'], 'teacher_id' => $teacher['id']];
                    array_push($classes, $class);
                }
            }
        }
        foreach ($studentArray as $student) {
            foreach ($classes as $class) {
                if ($student['class_id'] == $class['id']) {
                    $student += ['teacher_name' => $class['teacher_name'], 'teacher_email' => $class['teacher_email'], 'class_id' => $class['id'],'class_name' => $class['name'], 'class_location' => $class['location'], 'teacher_id' => $class['teacher_id']];
                    array_push($students, $student);
                }
            }
        }
        if (!empty($_POST['student_name']) && !empty($_POST['student_email']) && !empty($_POST['class_id'])) {
            $student = new Student($_POST['student_name'], $_POST['student_email'], (int)$_POST['class_id']);
            $database->insertStudent($student);
        }
        require 'View/studentView.php';
    }

}