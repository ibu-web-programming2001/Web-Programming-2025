<?php
require_once 'BaseService.php';
require_once 'OrderDao.php';

class OrderService extends BaseService {
    public function __construct() {
        $dao = new OrderDao();
        parent::__construct($dao);
    }

    public function getByUserId($user_id) {
        return $this->dao->getByUserId($user_id);
    }
}
?>
