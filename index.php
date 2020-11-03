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

require 'Controller/ClassroomController.php';
require 'Controller/TeacherController.php';
require 'Controller/StudentController.php';


$studController = new StudentController();
if (isset($_GET['page']) && $_GET['page'] == 'studentView.php') {
    $studController->studentData();
} else {
    $studController->getStudentData();
}




