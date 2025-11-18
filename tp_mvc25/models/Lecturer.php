<?php
include_once("DB.php");
class Lecturer extends DB
{
    function getLecturer() {
        $query = "SELECT * FROM lecturers";
        return $this->execute($query);
    }

    function add($data) {
        $name = mysqli_real_escape_string($this->db_link, $data['name']);
        $nidn = mysqli_real_escape_string($this->db_link, $data['nidn']);
        $phone = mysqli_real_escape_string($this->db_link, $data['phone']);
        $join_date = mysqli_real_escape_string($this->db_link, $data['join_date']);

        $query = "INSERT INTO lecturers(name, nidn, phone, join_date) VALUES ('$name', '$nidn', '$phone', '$join_date')";
        return $this->execute($query);
    }

    function getLecturerById($id) {
        $id = (int)$id;
        $query = "SELECT * FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }

    function edit($data){
        $id = (int)$data['id'];
        $name = mysqli_real_escape_string($this->db_link, $data['name']);
        $nidn = mysqli_real_escape_string($this->db_link, $data['nidn']);
        $phone = mysqli_real_escape_string($this->db_link, $data['phone']);
        $join_date = mysqli_real_escape_string($this->db_link, $data['join_date']);

        $query = "UPDATE lecturers
                SET name='$name', nidn='$nidn', phone='$phone', join_date='$join_date'
                WHERE id=$id";

        return $this->execute($query);
    }

    function delete($id) {
        $id = (int)$id;
        $query = "DELETE FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }
}
