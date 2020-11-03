<?php


class ClassroomLoader extends Database
{
    private array $classes = [];

    public function __construct()
    {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('SELECT * FROM class');
        $handle->execute();
        $classes = $handle->fetchAll();
        foreach ($classes as $class) {
            $this->classes[$class['id']] = new Classroom ($class['name'], $class['location']);
            $this->classes[$class['id']]->setId($class['id']);
        }
    }

    public function getClasses(): array
    {
        return $this->classes;
    }


}