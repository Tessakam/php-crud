<?php
declare(strict_types=1);

class Classroom extends Database
{
    private int $id, $teacherId;
    private string $name, $location;
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

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getTeacherId(): int
    {
        return $this->teacherId;
    }

    public function getStudents(): array
    {
        return $this->students;
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
        //In this UPDATE statement: WHERE clause specifies the row that will be updated.
        $handle = $this->openConnection()->prepare('UPDATE class SET name = :name, location = :location WHERE id= :id');
        $handle->bindValue(':name', $this->getName());
        $handle->bindValue(':location', $this->getLocation());
        $handle->bindValue(':id', $this->getId());
        //$teacherId = $this->getTeacherId();
        //$handle->bindValue('teacher', $teacherId);
        $handle->execute();
    }

}