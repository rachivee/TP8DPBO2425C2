<?php
include_once(__DIR__ . "/Template.php");

class LecturerView
{
    public function renderAddForm()
    {
        $tpl = new Template(__DIR__ . "/../templates/create.html");

        $tpl->replace("JUDUL_FORM", "Add New Lecturer");
        $tpl->replace("VAL_ID", "");
        $tpl->replace("VAL_NAME", "");
        $tpl->replace("VAL_NIDN", "");
        $tpl->replace("VAL_PHONE", "");
        $tpl->replace("VAL_JOIN_DATE", "");

        $tpl->write();
    }

    public function renderEditForm($data)
    {
        list($id, $name, $nidn, $phone, $join_date) = $data;

        $tpl = new Template(__DIR__ . "/../templates/edit.html");

        $tpl->replace("JUDUL_FORM", "Edit Lecturer");
        $tpl->replace("VAL_ID", $id);
        $tpl->replace("VAL_NAME", $name);
        $tpl->replace("VAL_NIDN", $nidn);
        $tpl->replace("VAL_PHONE", $phone);
        $tpl->replace("VAL_JOIN_DATE", $join_date);

        $tpl->write();
    }

    public function render($data)
    {
        $no = 1;
        $rows = "";

        foreach ($data as $row) {
            list($id, $name, $nidn, $phone, $join_date) = $row;

            $rows .= "
                <tr class='text-center align-middle'>
                    <td>{$no}</td>
                    <td>{$name}</td>
                    <td>{$nidn}</td>
                    <td>{$phone}</td>
                    <td>{$join_date}</td>
                    <td>
                        <a href='lecturer.php?edit={$id}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='lecturer.php?delete={$id}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                </tr>
            ";
            $no++;
        }

        $tpl = new Template(__DIR__ . "/../templates/index.html");
        $tpl->replace("JUDUL", "List of Lecturers");
        $tpl->replace("DATA_TABEL", $rows);

        $tpl->write();
    }
}
