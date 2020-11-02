<?php


class StudentLoader extends Database
{
    private array $students;

    private function loadStudent() {
        $pdo = $this->openConnection();
        $statement = $pdo->prepare('SELECT * FROM student');
        $statement->execute();
        $students = $statement->fetchAll();
        foreach ($students as $student) {
            $this->students[$student['id']] = new Student((string)$student['name'], (string)$student['email'], (int)$student['teacher_id']);
        }
    }

    public function getStudent(): array {
        $this->loadStudent();
        return $this->students;
    }

}