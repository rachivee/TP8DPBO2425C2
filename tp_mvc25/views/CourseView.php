<?php
include_once(__DIR__ . "/Template.php");

class CourseView
{
    public function render($data)
    {
        $rows = "";
        $no = 1;

        foreach ($data as $d) {
            list($id, $course_name, $course_code, $credits, $lecturer_id, $lecturer_name) = $d;

            $rows .= "
            <tr class='text-center align-middle'>
                <td>$no</td>
                <td>$course_name</td>
                <td>$course_code</td>
                <td>$credits</td>
                <td>$lecturer_name</td>
                <td>
                    <a href='course.php?edit=$id' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='course.php?delete=$id' class='btn btn-danger btn-sm'
                        onclick='return confirm(\"Delete this course?\")'>Delete</a>
                </td>
            </tr>";
            $no++;
        }

        $tpl = new Template(__DIR__ . "/../templates/course_index.html");
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->write();
    }

    public function renderAddForm($lecturers)
    {
        $options = "";
        foreach ($lecturers as $l) {
            $options .= "<option value='{$l['id']}'>{$l['name']}</option>";
        }

        $tpl = new Template(__DIR__ . "/../templates/course_create.html");
        $tpl->replace("OPTIONS_LECTURER", $options);
        $tpl->write();
    }

    public function renderEditForm($course, $lecturers)
    {
        list($id, $course_name, $course_code, $credits, $lecturer_id) = $course;

        $options = "";
        foreach ($lecturers as $l) {
            $selected = ($l['id'] == $lecturer_id) ? "selected" : "";
            $options .= "<option value='{$l['id']}' $selected>{$l['name']}</option>";
        }

        $tpl = new Template(__DIR__ . "/../templates/course_edit.html");
        $tpl->replace("VAL_ID", $id);
        $tpl->replace("VAL_NAME", $course_name);
        $tpl->replace("VAL_CODE", $course_code);
        $tpl->replace("VAL_CREDITS", $credits);
        $tpl->replace("OPTIONS_LECTURER", $options);
        $tpl->write();
    }
}
