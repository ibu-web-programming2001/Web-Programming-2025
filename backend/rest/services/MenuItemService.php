<?php
require_once 'BaseService.php';
require_once 'MenuItemDao.php';

class MenuItemService extends BaseService {
    public function __construct() {
        $dao = new MenuItemDao();
        parent::__construct($dao);
    }

    public function getByCategory($category) {
        return $this->dao->getByCategory($category);
    }
    
    public function createMenuItem($data) {
        // Example of business logic (e.g., ensure price is positive)
        if ($data['price'] <= 0) {
            throw new Exception('Price must be a positive value.');
        }

        return $this->create($data);
    }
}
?>
