<?php
declare(strict_types=1);

class Classroom extends Database
{
    private int $id, $teacherId;
    private string $name, $location;
    private string $teacherName;
    private array $students = [];

    public function __construct(string $name, string $location)
    {
        $this->name = ucwords($name);
        $this->location = ucwords($location);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getTeacherName(): string
    {
        return $this->teacherName;
    }

    public function setTeacherName(string $teacherName): void
    {
        $this->teacherName = $teacherName;
    }

    public function getTeacherId(): int
    {
        return $this->teacherId;
    }

    public function setTeacherId(): void
    {
        $this->teacherId = $this->getTeacherData($this->getId());
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function setStudents(): void
    {
        $this->students = $this->getStudentData($this->getId());
    }

    public function insertData()
    {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('INSERT INTO class (name, location) VALUES (:name, :location)');
        $handle->bindValue(':name', $this->getName());
        $handle->bindValue(':location', $this->getLocation());
        $handle->execute();
        $this->id = (int)$pdo->lastInsertId();
    }

    public function updateData()
    {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('UPDATE class SET name = :name, location = :location WHERE id= :id');
        $handle->bindValue(':name', $this->getName());
        $handle->bindValue(':location', $this->getLocation());
        $handle->bindValue(':id', $this->getId());
        $handle->execute();
    }


    private function getTeacherData($id)
    {
        $handle = $this->openConnection()->prepare('SELECT id from teacher WHERE class_id = :class_id');
        $handle->bindValue(':class_id', $id);
        $handle->execute();
        return $handle->fetch();
    }

    private function getStudentData($id)
    {
        $handle = $this->openConnection()->prepare('SELECT id from student WHERE teacher_id = :teacher_id');
        $handle->bindValue(':teacher_id', $this->getTeacherData($id));
        $handle->execute();
        return $handle->fetchAll();
    }
}