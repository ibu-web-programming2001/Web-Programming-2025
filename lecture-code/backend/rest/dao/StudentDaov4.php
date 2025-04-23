<?php
require_once __DIR__ . '/BaseDaov2.php';

class StudentDaov4 extends BaseDaov2
{
    protected $table_name;

    public function __construct()
    {
        $this->table_name = "students";
        parent::__construct($this->table_name);
    }

    public function get_all()
    {
        return $this->query('SELECT * FROM ' . $this->table_name, []);
    }

    public function get_by_id($id)
    {
        return $this->query_unique('SELECT * FROM ' . $this->table_name . ' WHERE id=:id', ['id' => $id]);
    }

    public function get_by_email($email)
    {
        return $this->query_unique('SELECT * FROM ' . $this->table_name . ' WHERE email=:email', ['email' => $email]);
    }

    public function get_by_department($department_id)
    {
        return $this->query_unique('SELECT * FROM ' . $this->table_name . ' WHERE department_id=:department_id', ['department_id' => $department_id]);
    }

    public function count_students_paginated($search)
    {
        $query = "SELECT COUNT(*) AS count
                  FROM " . $this->table_name . "
                  WHERE LOWER(name) LIKE CONCAT('%', :search, '%') OR 
                        LOWER(email) LIKE CONCAT('%', :search, '%');";
        return $this->query_unique($query, [
            'search' => $search
        ]);
    }

    public function get_students_paginated($offset, $limit, $search, $order_column, $order_direction)
    {
        $query = "SELECT *
                  FROM " . $this->table_name . "
                  WHERE LOWER(name) LIKE CONCAT('%', :search, '%') OR 
                        LOWER(email) LIKE CONCAT('%', :search, '%')
                  ORDER BY {$order_column} {$order_direction}
                  LIMIT {$offset}, {$limit}";
        return $this->query($query, [
            'search' => $search
        ]);
    }
}
