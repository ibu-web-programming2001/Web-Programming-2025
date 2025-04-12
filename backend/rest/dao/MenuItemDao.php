<?php
require_once 'BaseDao.php';

class MenuItemDao extends BaseDao {
    private $connection;
    private $table_name = "menu_items";
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

    public function getByCategory($category) {
        $stmt = $this->connection->prepare("SELECT * FROM menu_items WHERE category = :category");
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>