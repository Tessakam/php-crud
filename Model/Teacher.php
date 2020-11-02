<?php
declare(strict_types=1);

class Teacher
{ //added properties and type
    private string $name;
    private string $email;
    private string $studentsToTeacher;

    //added method with properties included
    public function __construct(string $name, string $email, string $studentsToTeacher)
    {

        $this->name = $name;
        $this->email = $email;
        $this->studentsToTeacher = $studentsToTeacher;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function getStudentsToTeacher(): string
    {
        return $this->studentsToTeacher;
    }
    //get the private properties

}