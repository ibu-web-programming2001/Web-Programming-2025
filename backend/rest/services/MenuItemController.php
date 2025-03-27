<?php
require_once 'MenuItemBusinessLogic.php';

class MenuItemController {
    private $menuItemBusinessLogic;

    public function __construct() {
        $this->menuItemBusinessLogic = new MenuItemBusinessLogic();
    }

    public function handleRequest() {
        // Example of handling a create request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            try {
                $this->menuItemBusinessLogic->createMenuItem($data);
                echo json_encode(['message' => 'Menu item created successfully.']);
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
        }

        // Example of handling a get request
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $category = $_GET['category'] ?? '';
            $menuItems = $this->menuItemBusinessLogic->getMenuItemsByCategory($category);
            echo json_encode($menuItems);
        }
    }
}
?>
