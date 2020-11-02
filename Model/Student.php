<?php


class Student
{
    private int $id;
    private string $name;
    private string $email;
    private Classroom $class;
    private Teacher $teacher;


    public function __construct(int $id, string $name, string $email, Classroom $class, Teacher $teacher)
    {
        $this->id = $id;
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



}