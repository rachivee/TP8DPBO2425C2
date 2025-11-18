<?php
include_once("DB.php");

class Course extends DB 
{
    function getCourses() {
        $query = "SELECT courses.*, lecturers.name AS lecturer_name
                  FROM courses
                  LEFT JOIN lecturers ON courses.lecturer_id = lecturers.id";
        return $this->execute($query);
    }

    function getLecturers() {
        $query = "SELECT id, name FROM lecturers";
        return $this->execute($query);
    }

    function getCourseById($id) {
        $query = "SELECT * FROM courses WHERE id = $id";
        return $this->execute($query);
    }

    function add($data) {
        $course_name = $data['course_name'];
        $course_code = $data['course_code'];
        $credits = $data['credits'];
        $lecturer_id = $data['lecturer_id'];

        $query = "INSERT INTO courses(course_name, course_code, credits, lecturer_id)
                  VALUES('$course_name', '$course_code', $credits, $lecturer_id)";
        return $this->execute($query);
    }

    function edit($data) {
        $id = $data['id'];
        $course_name = $data['course_name'];
        $course_code = $data['course_code'];
        $credits = $data['credits'];
        $lecturer_id = $data['lecturer_id'];

        $query = "UPDATE courses
                  SET course_name='$course_name',
                      course_code='$course_code',
                      credits=$credits,
                      lecturer_id=$lecturer_id
                  WHERE id=$id";

        return $this->execute($query);
    }

    function delete($id) {
        $query = "DELETE FROM courses WHERE id = $id";
        return $this->execute($query);
    }
}
