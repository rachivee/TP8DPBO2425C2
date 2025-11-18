<?php
include_once("connection.php");
include_once("models/Lecturer.php");
include_once("views/LecturerView.php");

class LecturerController
{
    private $lecturer;

    function __construct()
    {
        $this->lecturer = new Lecturer(
            Connection::$db_host,
            Connection::$db_user,
            Connection::$db_pass,
            Connection::$db_name
        );
    }

    // List semua lecturer
    public function index()
    {
        $this->lecturer->open();
        $this->lecturer->getLecturer();

        $data = array();
        while ($row = $this->lecturer->getResult()) {
            $data[] = $row;
        }

        $this->lecturer->close();

        $view = new LecturerView();
        $view->render($data);
    }

    // Tampilkan form add
    public function addForm()
    {
        $view = new LecturerView();
        $view->renderAddForm();
    }

    // Proses add
    public function add($data)
    {
        $this->lecturer->open();
        $this->lecturer->add($data);
        $this->lecturer->close();

        header("Location: lecturer.php");
        exit();
    }

    // Tampilkan form edit (mengambil data berdasarkan id)
    public function editForm($id)
    {
        $this->lecturer->open();
        $this->lecturer->getLecturerById($id);
        $data = $this->lecturer->getResult();
        $this->lecturer->close();

        $view = new LecturerView();
        $view->renderEditForm($data);
    }

    // Proses edit
    public function edit($data)
    {
        $this->lecturer->open();
        $this->lecturer->edit($data);
        $this->lecturer->close();

        header("Location: lecturer.php");
        exit();
    }

    // Delete
    public function delete($id)
    {
        $this->lecturer->open();
        $this->lecturer->delete($id);
        $this->lecturer->close();

        header("Location: lecturer.php");
        exit();
    }
}
