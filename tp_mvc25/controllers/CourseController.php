<?php
include_once("connection.php");
include_once("models/Course.php");
include_once("views/CourseView.php");

class CourseController
{
    private $course;

    function __construct()
    {
        $this->course = new Course(
            Connection::$db_host,
            Connection::$db_user,
            Connection::$db_pass,
            Connection::$db_name
        );
    }

    public function index()
    {
        $this->course->open();
        $this->course->getCourses();

        $data = [];
        while ($row = $this->course->getResult()) {
            $data[] = $row;
        }
        $this->course->close();

        $view = new CourseView();
        $view->render($data);
    }

    public function addForm()
    {
        $this->course->open();
        $this->course->getLecturers();

        $lecturers = [];
        while ($row = $this->course->getResult()) {
            $lecturers[] = $row;
        }
        $this->course->close();

        $view = new CourseView();
        $view->renderAddForm($lecturers);
    }

    public function add($post)
    {
        $this->course->open();
        $this->course->add($post);
        $this->course->close();

        header("Location: course.php");
    }

    public function editForm()
    {
        $id = $_GET['edit'];

        // get course
        $this->course->open();
        $this->course->getCourseById($id);
        $course = $this->course->getResult();
        $this->course->close();

        // get lecturers
        $this->course->open();
        $this->course->getLecturers();

        $lecturers = [];
        while ($row = $this->course->getResult()) {
            $lecturers[] = $row;
        }
        $this->course->close();

        $view = new CourseView();
        $view->renderEditForm($course, $lecturers);
    }

    public function edit($post)
    {
        $this->course->open();
        $this->course->edit($post);
        $this->course->close();

        header("Location: course.php");
    }

    public function delete($id)
    {
        $this->course->open();
        $this->course->delete($id);
        $this->course->close();

        header("Location: course.php");
    }
}
