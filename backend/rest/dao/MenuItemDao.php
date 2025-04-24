<?php
require_once 'BaseDao.php';

class MenuItemDao extends BaseDao {
    protected $table_name;

    public function __construct()
    {
        $this->table_name = "menu_items";
        parent::__construct($this->table_name);
    }

    public function getByCategory($category) {
        $stmt = $this->connection->prepare("SELECT * FROM menu_items WHERE category = :category");
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>