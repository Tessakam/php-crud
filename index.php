<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Model/Database.php';
require 'Model/Classroom.php';
require 'Model/ClassroomLoader.php';
require 'Model/Teacher.php';
require 'Model/Teacherloader.php';
require 'Model/Student.php';
require 'Model/StudentLoader.php';

if (isset($_GET['page']) && $_GET['page'] == 'studentView.php') {
    require 'Controller/StudentController.php';
    $studController = new StudentController();
    $studController->studentData();
} elseif (isset($_GET['page']) && $_GET['page'] == 'TeacherView.php') {
    require 'Controller/TeacherController.php';
    $controller = new TeacherController();
    $controller->getTeacher();
} else {
    require 'Controller/StudentController.php';
    $studController = new StudentController();
    $studController->getStudentData();
}




