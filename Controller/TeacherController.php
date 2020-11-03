<?php


class TeacherController
{
    private Teacher $teacher;

    public function getTeacherData() {
        if (!empty($_POST['teacher_name']) && !empty($_POST['teacher_email'])) {
            $controller = new ClassroomController();
            $controller->getClassData();
            $this->teacher = new Teacher($_POST['teacher_name'], $_POST['teacher_email'], $controller->getClassroom());
            $this->teacher->insert();

        }

    }


    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }


}