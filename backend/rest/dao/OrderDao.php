<?php
require_once 'BaseDao.php';

class OrderDao extends BaseDao {
    private $connection;
    private $table_name = "orders";
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

    public function getByUserId($user_id) {
        $stmt = $this->connection->prepare("SELECT * FROM orders WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>



