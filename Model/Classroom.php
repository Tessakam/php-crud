<?php


class Classroom
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


}