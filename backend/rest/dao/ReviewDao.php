<?php
require_once 'BaseDao.php';

class ReviewDao extends BaseDao {
    public function __construct() {
        parent::__construct("reviews");
    }

    public function getByMenuItem($menu_item_id) {
        $stmt = $this->connection->prepare("SELECT * FROM reviews WHERE menu_item_id = :menu_item_id");
        $stmt->bindParam(':menu_item_id', $menu_item_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
