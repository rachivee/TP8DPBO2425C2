<?php
include_once("controllers/LecturerController.php");

$lecturer = new LecturerController();

// Show add form
if (isset($_GET['add'])) {
    $lecturer->addForm();
    exit;
}

// Process add
if (isset($_POST['add'])) {
    $lecturer->add($_POST);
    exit;
}

// Show edit form
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $lecturer->editForm($id);
    exit;
}

// Process edit
if (isset($_POST['edit'])) {
    $lecturer->edit($_POST);
    exit;
}

// Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $lecturer->delete($id);
    exit;
}

// Default: list
$lecturer->index();
