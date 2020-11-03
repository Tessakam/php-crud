<?php

declare(strict_types=1);

class Teacher extends Database
{
    private int $id;
    private string $name;
    private string $email;
    private Classroom $class;

    //added method with properties included
    public function __construct(string $name, string $email, Classroom $class)
    {
        $this->name = ucwords($name);
        $this->email = $email;
        $this->class = $class;
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


    public function getEmail(): string
    {
        return $this->email;
    }


    public function getClass(): Classroom
    {
        return $this->class;
    }


    // insert teacher data to the teacher table in the database manager.
    public function insert() {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('INSERT INTO teacher (name, email, class_id) VALUES (:name, :email, :class_id)');
        $handle->bindValue(':name', $this->getName());
        $handle->bindValue(':email', $this->getEmail());
        $handle->bindValue(':teacher_id', $this->getClass()->getId());
        $handle->execute();
        $this->id = (int)$pdo->lastInsertId();
    }
}