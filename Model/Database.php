<?php

declare(strict_types=1);
class Database
{

    public function openConnection(): PDO {
        require 'config.php';

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO( 'mysql:host='. $dbHost . ';dbname='. $db, $dbUser, $dbPass, $driverOptions);
    }


    public function insertStudent(Student $student) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('INSERT INTO student (name, email, class_id) VALUES (:name, :email, :class_id)');
        $handle->bindValue(':name', $student->getName());
        $handle->bindValue(':email', $student->getEmail());
        $handle->bindValue(':class_id', $student->getClassId());
        $handle->execute();
        $student->setId((int)$pdo->lastInsertId());
    }

    public function insertTeacher(Teacher $teacher) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('INSERT INTO teacher (name, email, class_id) VALUES (:name, :email, :class_id)');
        $handle->bindValue(':name', $teacher->getName());
        $handle->bindValue(':email', $teacher->getEmail());
        $handle->bindValue(':class_id', $teacher->getClassId());
        $handle->execute();
        $teacher->setId((int)$pdo->lastInsertId());
    }

    public function insertClass(Classroom $classroom) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('INSERT INTO class (name, location) VALUES (:name, :location)');
        $handle->bindValue(':name', $classroom->getName());
        $handle->bindValue(':location', $classroom->getLocation());
        $handle->execute();
        $classroom->setId((int)$pdo->lastInsertId());
    }


    public function updateStudent($name, $email, $id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('UPDATE student SET name = :name, email = :email WHERE id = :id');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':email', $email);
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function updateTeacher($name, $email, $id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('UPDATE student SET name = :name, email = :email WHERE id = :id');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':email', $email);
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function updateClassroom($name, $location, $id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('UPDATE student SET name = :name, location = :location WHERE id = :id');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':email', $location);
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function deleteStudent($id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('DELETE FROM student WHERE id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function deleteTeacher($id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('DELETE FROM teacher WHERE id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function deleteClassroom($id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('DELETE FROM class WHERE id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function displayStudents() {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare("SELECT * FROM student");
        $handle->execute();
        return $handle->fetchAll();
    }

    public function displayTeachers() {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare("SELECT * FROM teacher");
        $handle->execute();
        return $handle->fetchAll();
    }


    public function displayClasses() {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare("SELECT * FROM class");
        $handle->execute();
        return $handle->fetchAll();
    }

    public function getStudentName($class_id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('SELECT name FROM student WHERE class_id = :class_id');
        $handle->bindValue('class_id', $class_id);
        $handle->execute();
        return $handle->fetchAll();
    }

}