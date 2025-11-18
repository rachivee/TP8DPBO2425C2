<?php
include_once("controllers/CourseController.php");

$course = new CourseController();

if (isset($_GET['add'])) {
    $course->addForm();
} 
else if (isset($_POST['add'])) {
    $course->add($_POST);
} 
else if (isset($_GET['edit'])) {
    $course->editForm();
}
else if (isset($_POST['edit'])) {
    $course->edit($_POST);
} 
else if (isset($_GET['delete'])) {
    $course->delete($_GET['delete']);
}
else {
    $course->index();
}
