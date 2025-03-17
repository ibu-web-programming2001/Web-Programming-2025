<?php
require_once __DIR__ . '/BaseDaov2.php';

class ProfessorDaov4 extends BaseDaov2
{

    protected $table_name;
    public function __construct()
    {
        $this->table_name = "professors";
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
}
