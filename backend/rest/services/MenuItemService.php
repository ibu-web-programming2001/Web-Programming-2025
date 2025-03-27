<?php
require_once 'BaseService.php';
require_once 'MenuItemDao.php';

class MenuItemService extends BaseService {
    public function __construct() {
        $dao = new MenuItemDao();
        parent::__construct($dao);
    }

    // Custom business logic can be added here.
    public function getByCategory($category) {
        return $this->dao->getByCategory($category);
    }
}
?>
