<?php
require_once 'MenuItemService.php';

$menu_item_service = new MenuItemService();
$menus = $menu_item_service->createMenuItem(); 
print_r($menus);
$categories = $menu_item_service->getByCategory(); 
print_r($categories);
?>
