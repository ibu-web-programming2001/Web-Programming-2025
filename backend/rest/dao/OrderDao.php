<?php
require_once 'BaseDao.php';

class OrderDao extends BaseDao {
    protected $table_name;

    public function __construct()
    {
        $this->table_name = "orders";
        parent::__construct($this->table_name);
    }

    public function getByUserId($user_id) {
        $stmt = $this->connection->prepare("SELECT * FROM orders WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>



