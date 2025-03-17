<?php
require_once __DIR__ . '/BaseDaov1.php';

class StudentDaov3 extends BaseDaov1
{
    protected $table_name;

    public function __construct()
    {
        $this->table_name = "students";
        parent::__construct($this->table_name);
    }

    public function add($name, $email)
    {
        $query = "INSERT INTO " . $this->table_name . " (name, email) VALUES (?, ?)";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute([$name, $email]);
    }

    public function update($id, $name, $email)
    {
        $query = "UPDATE " . $this->table_name . " SET name = ?, email = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute([$name, $email, (int) $id]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute([(int) $id]);
    }
}
