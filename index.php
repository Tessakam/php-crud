<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Model/Database.php'; //should be on top because student extends from database
require 'Model/Student.php';
require 'Model/Teacher.php';
require 'Model/Classroom.php';

//if you choose a student show the student page
if (isset($_GET['page']) && $_GET['page'] == 'student') {
    require 'Controller/StudentController.php';
    $controller = new StudentController();
    $controller->deleteStudent();
} elseif (isset($_GET['page']) && $_GET['page'] == 'teacher') { //else show the teacher page
    require 'Controller/TeacherController.php';
    $controller = new TeacherController();
} elseif (isset($_GET['page']) && $_GET['page'] == 'class') { //else show the teacher page
    require 'Controller/ClassroomController.php';
    $controller = new ClassroomController();
} else {
    require 'Controller/HomepageController.php';
    $controller = new HomepageController();
}
//render the view
$controller->render();

/*$studController = new StudentController();
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
}*/

/*$teacherController = new TeacherController();
if (isset($_GET ['page']) && $_GET['page'] == 'TeacherView.php') {
    $teacherController->teacherData();
} else {
    $teacherController->getTeacherData();
}*/

