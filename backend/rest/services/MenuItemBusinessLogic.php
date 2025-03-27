<?php
require_once 'MenuItemService.php';

class MenuItemBusinessLogic {
    private $menuItemService;

    public function __construct() {
        $this->menuItemService = new MenuItemService();
    }

    public function createMenuItem($data) {
        // Example of business logic (e.g., ensure price is positive)
        if ($data['price'] <= 0) {
            throw new Exception('Price must be a positive value.');
        }

        return $this->menuItemService->create($data);
    }

    public function getMenuItemsByCategory($category) {
        return $this->menuItemService->getByCategory($category);
    }
}
?>
