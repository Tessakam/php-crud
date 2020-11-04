<?php

declare(strict_types=1);

class ClassroomController
{
    public function render()
    {
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
                } else {
                    $classes = $database->displayClasses();
                }
            }

        }
        if (!empty($_POST['class_name']) && !empty($_POST['class_location'])) {
            $classroom = new Classroom($_POST['class_name'], $_POST['class_location']);
            $database->insertClass($classroom);
        }
        $this->deleteClass();
        $this->updateClass();

        require 'View/class.php';
    }

    public function deleteClass()
    {
        $database = new Database();

        if (isset($_POST['delete']) && !count($database->getStudentFromClass($_POST['id']))) {
            $database->deleteClassroom($_POST['id']);
        }
    }
    //A teacher cannot be removed if he is still assigned to a class
    //If you remove a class, make sure to remove the link between the students and the class.
    //count = true

    public function updateClass()
    {
        if (isset($_POST['update'])) {
            $database = new Database();
            $database->updateClassroom($_POST['name'], $_POST['email'], $_POST['id']);
        }
    }

}