<?php
require_once 'BaseDao.php';

class MenuItemDao extends BaseDao {
    public function __construct() {
        parent::__construct("menu_items");
    }

    public function getByCategory($category) {
        $stmt = $this->connection->prepare("SELECT * FROM menu_items WHERE category = :category");
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>