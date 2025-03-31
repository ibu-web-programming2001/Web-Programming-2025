<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/StudentDaov4.php";

class StudentServicev2 extends BaseService
{
    public function __construct()
    {
        parent::__construct(new StudentDaov4);
    }

    public function get_all()
    {
        return $this->dao->get_all();
    }

    public function get_by_id($id)
    {
        return $this->dao->get_all($id);
    }

    public function add($entity)
    {
        $entity['password'] = md5($entity['password']);
        return parent::add($entity);
        unset($entity['password']);
        
        /*
        //example
        $mail_dao = new MailDao();
        $mail_dao->send_email($entity["email"], "Welcome");
        if(!validateField($entity, "first_name")){
            //error
        }
            */
        
    }

    public function delete_student($id)
    {
        return $this->dao->delete($id);
    }

    public function update_student($student, $id_column = "id")
    {
        $id = $student['id'];
        unset($student['id']);
        $student['password'] = md5($student['password']);
        if (isset($student['id_column'])  && !is_null($student['id_column'])) {
            return parent::update($student, $id, $student['id_column']);
        }
        return parent::update($student, $id);
    }
}
