<?php


class Teacherloader extends Database
{
    private array $teachers = [];

    public function __construct() {
        $pdo = $this->openConnection();
        $statement = $pdo->prepare('SELECT * FROM teacher');
        $statement->execute();
        $teachers = $statement->fetchAll();
        $loader = new ClassroomLoader();
        foreach ($teachers as $teacher) {
            $classroom = $loader->getClasses()[$teacher['class_id']];
            $this->teachers[$teacher['id']] = new Teacher((string)$teacher['name'], (string)$teacher['email'], $classroom);


        }
    }

    public function getTeachers(): array {
        return $this->teachers;
    }


}