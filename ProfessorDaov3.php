<?php
require_once __DIR__ . '/BaseDaov1.php';

class ProfessorDaov3 extends BaseDaov1
{

    protected $table_name;
    public function __construct()
    {
        $this->table_name = "professors";
        parent::__construct($this->table_name);
    }

    public function add($name, $department)
    {
        $query = "INSERT INTO " . $this->table_name . " (name, department) VALUES (?, ?)";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute([$name, $department]);
    }

    public function update($id, $name, $department)
    {
        $query = "UPDATE " . $this->table_name . " SET name = ?, department = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute([$name, $department, (int) $id]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute((int) [$id]);
    }
}
