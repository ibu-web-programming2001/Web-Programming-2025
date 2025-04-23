<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/StudentDaov4.php";

class StudentServicev3 extends BaseService
{
    public function __construct()
    {
        parent::__construct(new StudentDaov4);
    }

    public function add($entity)
    {
        $is_email_existing = $this->dao->get_by_email($entity["email"]);
        if($is_email_existing){
            return [];
        }

        return parent::add($entity);
    }

    public function get_department_students($department_id){
        return $this->dao->get_by_department($department_id);
    }
}
