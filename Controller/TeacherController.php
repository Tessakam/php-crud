<?php

declare(strict_types=1);
class TeacherController
{
    public function render() {
        $database = new Database();
        $teacherArray = $database->displayTeachers();
        $classes = $database->displayClasses();
        $teachers = [];
        foreach ($teacherArray as $teacher) {
            foreach ($classes as $class) {
                if ($teacher['class_id'] == $class['id']) {
                    $teacher += ['class_name' => $class['name'], 'class_location' => $class['location']];
                    array_push($teachers, $teacher);
                }
            }
        }
        if (!empty($_POST['teacher_name']) && !empty($_POST['teacher_email']) && !empty($_POST['class_id'])) {
            $teacher = new Teacher($_POST['teacher_name'], $_POST['teacher_email'], (int)$_POST['class_id']);
            $database->insertTeacher($teacher);
        }
        require 'View/TeacherView.php';
    }

}