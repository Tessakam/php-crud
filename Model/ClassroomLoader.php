<?php


class ClassroomLoader extends Database
{
    private array $classes = [];

    public function __construct()
    {
        $handle = $this->openConnection()->prepare('SELECT * FROM class');
        $handle->execute();


        foreach ($handle->fetchAll() as $class) {
            array_push($this->classes, new Classroom ($class['name'], $class['location'], ));
        }
    }

    public function getClasses(): array
    {
        return $this->classes;
    }
}