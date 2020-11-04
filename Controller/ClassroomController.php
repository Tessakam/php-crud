<?php

declare(strict_types=1);
//flow structure could be better by adding private class and adding require in render.

class ClassroomController
{
    public function render() {
        $database = new Database();
        $classArray = $database->displayClasses();
        $teacherArray = $database->displayTeachers();
        $classes = [];
        foreach ($teacherArray as $teacher) {
            $studentName = $database->getStudentFromClass($teacher['id']);
            foreach ($classArray as $class) {
                if ($teacher['class_id'] == $class['id']) {
                    $class += ['teacher_name' => $teacher['name'], 'teacher_id' => $teacher['id'], 'student_num' => count($studentName)];
                    array_push($classes, $class);
                }
            }
        }
        if (!empty($_POST['class_name']) && !empty($_POST['class_location'])) {
            $classroom = new Classroom($_POST['class_name'], $_POST['class_location']);
            $database->insertClass($classroom);
        }

        require 'View/class.php';
    }
}