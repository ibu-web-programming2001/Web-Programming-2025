<?php
require_once __DIR__ . '/../dao/StudentDaov4.php';

class StudentServicev1
{
    private $student_dao;

    public function __construct()
    {
        $this->student_dao = new StudentDaov4();
    }
    public function get_all()
    {
        return $this->student_dao->get_all();
    }

    public function get_by_id($id)
    {
        return $this->student_dao->get_all($id);
    }

    public function add($entity)
    {
        $entity['password'] = md5($entity['password']);
        return $this->student_dao->add($entity);
    }

    public function delete_student($id)
    {
        return $this->student_dao->delete($id);
    }

    public function update_student($student, $id_column = "id")
    {
        $id = $student['id'];
        unset($student['id']);
        $student['password'] = md5($student['password']);
        if (isset($student['id_column'])  && !is_null($student['id_column'])) {
            return $this->student_dao->update($student, $id, $student['id_column']);
        }
        return $this->student_dao->update($student, $id);
    }
}
