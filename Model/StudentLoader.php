<?php


class StudentLoader extends Database
{
    private array $students;

    public function __construct() {
        $pdo = $this->openConnection();
        $statement = $pdo->prepare('SELECT * FROM student');
        $statement->execute();
        $students = $statement->fetchAll();
        $loader = new Teacherloader();
        foreach ($students as $student) {
            $teacher = $loader->getTeacher()[$student['teacher_id']];
            $this->students[$student['id']] = new Student((string)$student['name'], (string)$student['email'], $teacher);
        }
    }

    public function getStudent(): array {
        return $this->students;
    }

}