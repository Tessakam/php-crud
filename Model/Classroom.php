<?php


class Classroom extends Database
{
    private int $id;
    private string $name, $location;
    private Teacher $teacher;


    public function __construct(string $name, string $location, Teacher $teacher)
    {
        $this->name = ucwords($name);
        $this->location = ucwords($location);
        $this->teacher = ucwords($teacher);
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

    public function getTeacher(): int
    {
        return $this->teacher;
    }

    public function insertData()
    {
        $handle = $this->openConnection()->prepare('INSERT INTO class (name, location) VALUES (:name, :location)');
        $handle->bindValue(':name', $this->getName());
        $handle->bindValue(':teacher_id', $this->getTeacher()->getId());
        $handle->bindValue(':location', $this->getLocation());
        $handle->execute();
        $this->id = $this->openConnection()->lastInsertId();
    }

}