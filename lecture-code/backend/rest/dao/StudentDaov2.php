<?php
require_once __DIR__ . "/../config.php";

class StudentDaov2
{
    private $connection;
    private $table_name = "students";
    public function __construct()
    {
        try {
            $this->connection = new PDO(
                "mysql:host=" . Config::DB_HOST() . ";dbname=" . Config::DB_NAME() . ";port=" . Config::DB_PORT(),
                Config::DB_USER(),
                Config::DB_PASSWORD(),
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
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
        $stmt->execute([(int) (int)$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
