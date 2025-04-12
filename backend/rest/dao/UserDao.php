<?php
require_once 'BaseDao.php';

class UserDao extends BaseDao {
    
    private $connection;
    private $table_name = "users";
    public function __construct()
    {
        try {
            $host = 'localhost';
            $dbName = 'restoraount';
            $dbPort = 3306;
            $username = 'root';
            $password = '';

            $this->connection = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getByEmail($email) {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>