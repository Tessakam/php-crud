<?php


class Classroom extends Database
{
    private int $id;
    private string $name, $location;
    private int $teacher_id;

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
        return $this->teacher_id;
    }

    public function insertData()
    {
        $handle = $this->openConnection()->prepare('INSERT INTO class (name, teacher_id, location) VALUES (:name, :teacher, :location)');
        $handle->bindValue(':name', $this->getName());
        $handle->bindValue(':teacher_id', $this->getTeacherId());
        $handle->bindValue(':location', $this->getLocation());
        $handle->execute();
    }

}