<?php
require_once 'BaseDao.php';

class ReviewDao extends BaseDao {
    protected $table_name;

    public function __construct()
    {
        $this->table_name = "reviews";
        parent::__construct($this->table_name);
    }
    public function getByMenuItem($menu_item_id) {
        $stmt = $this->connection->prepare("SELECT * FROM reviews WHERE menu_item_id = :menu_item_id");
        $stmt->bindParam(':menu_item_id', $menu_item_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
