<?php


class Student extends Database
{
    private int $id;
    private string $name;
    private string $email;
    private Classroom $class;
    private Teacher $teacher;


    public function __construct(string $name, string $email, Classroom $class, Teacher $teacher)
    {
        $this->name = $name;
        $this->email = $email;
        $this->class = $class;
        $this->teacher = $teacher;
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

    public function getClass(): Classroom
    {
        return $this->class;
    }

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }


    // insert student data to the student table in the database manager.
    public function insert() {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('INSERT INTO student (name, email, class_id, teacher_id) VALUES (:name, :email, :class_id, :teacher_id)');
        $handle->bindValue(':name', $this->getName());
        $handle->bindValue(':email', $this->getEmail());
        $handle->bindValue(':class_id', $this->getClass()->getId());
        $handle->bindValue(':teacher_id', $this->getTeacher()->getId());
        $handle->execute();
        $this->id = $pdo->lastInsertId();
    }
}