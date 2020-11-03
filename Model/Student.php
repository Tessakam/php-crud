<?php

declare(strict_types=1);
class Student extends Database
{
    private int $id;
    private string $name;
    private string $email;
    private Teacher $teacher;


    public function __construct(string $name, string $email, Teacher $teacher)
    {
        $this->name = ucwords($name);
        $this->email = $email;
        $this->teacher = $teacher;
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


    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }



    // insert student data to the student table in the database manager.
    public function insert() {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('INSERT INTO student (name, email, teacher_id) VALUES (:name, :email, :teacher_id)');
        $handle->bindValue(':name', $this->getName());
        $handle->bindValue(':email', $this->getEmail());
        $handle->bindValue(':teacher_id', $this->getTeacher()->getId());
        $handle->execute();
        $this->id = (int)$pdo->lastInsertId();
    }


    public function update($id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('UPDATE student SET name = :name, email = :email WHERE id = :id');
        $handle->bindValue(':name', $this->getName());
        $handle->bindValue(':email', $this->getEmail());
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function delete($id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('DELETE FROM student WHERE id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }


}