<?php

declare(strict_types=1);
class Student
{
    private int $id;
    private string $name;
    private string $email;
    private int $classId;


    public function __construct(string $name, string $email, int $classId)
    {
        $this->name = ucwords($name);
        $this->email = $email;
        $this->classId = $classId;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function getClassId(): int
    {
        return $this->classId;
    }

}