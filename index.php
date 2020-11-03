<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


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




//if you choose a student show the student page
if (isset($_GET['page'])) {
    require 'Controller/StudentController.php';
    $controller = new StudentController();
} else { //else show the teacher page
    require 'Controller/TeacherController.php';
    $controller = new TeacherController();
}
//render the view
$controller->render();

