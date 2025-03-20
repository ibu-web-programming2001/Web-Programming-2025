<?php
class ProfessorDaov1
{
    private $connection;
    private $table_name = "professors";
    public function __construct()
    {
        try {
            $host = 'localhost';
            $dbName = 'university';
            $dbPort = 3306;
            $username = 'root';
            $password = '80sarajevo';

            $this->connection = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function get_all()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_by_id($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
        return $stmt->execute([(int) $id]);
    }
}
