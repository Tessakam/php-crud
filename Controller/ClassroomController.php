<?php


class ClassroomController
{
    private Classroom $classroom;

    public function getClassData() {
        if (!empty($_POST['class_name']) && !empty($_POST['class_location'])) {
            $this->classroom = new Classroom($_POST['class_name'], $_POST['class_location']);
            $this->classroom->insertData();
        }

    }

    public function getClassroom(): Classroom
    {
        return $this->classroom;
    }


}