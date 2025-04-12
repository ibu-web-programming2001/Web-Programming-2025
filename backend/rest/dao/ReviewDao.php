<?php
require_once 'BaseDao.php';

class ReviewDao extends BaseDao {
    private $connection;
    private $table_name = "reviews";
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
    public function getByMenuItem($menu_item_id) {
        $stmt = $this->connection->prepare("SELECT * FROM reviews WHERE menu_item_id = :menu_item_id");
        $stmt->bindParam(':menu_item_id', $menu_item_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
