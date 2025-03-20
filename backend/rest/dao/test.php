
<?php
require_once 'dao/UserDao.php';
require_once 'dao/MenuItemDao.php';
require_once 'dao/OrderDao.php';
require_once 'dao/ReservationDao.php';
require_once 'dao/ReviewDao.php';

$userDao = new UserDao();
$menuItemDao = new MenuItemDao();
$orderDao = new OrderDao();
$reservationDao = new ReservationDao();
$reviewDao = new ReviewDao();

// Insert a new user (Customer)
$userDao->insert([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => password_hash('password123', PASSWORD_DEFAULT),
    'role' => 'Customer'
]);

// Insert a new menu item
$menuItemDao->insert([
    'name' => 'Spaghetti Carbonara',
    'description' => 'Classic Italian pasta dish',
    'price' => 12.99,
    'category' => 'Main Course',
    'image_url' => 'images/spaghetti.jpg'
]);

// Fetch all users
$users = $userDao->getAll();
print_r($users);

// Fetch all menu items
$menuItems = $menuItemDao->getAll();
print_r($menuItems);

// Insert a new order
$orderDao->insert([
    'user_id' => 1,
    'status' => 'Pending',
    'total_price' => 25.98,
    'order_date' => date('Y-m-d H:i:s')
]);

// Fetch all orders
$orders = $orderDao->getAll();
print_r($orders);

// Insert a new reservation
$reservationDao->insert([
    'user_id' => 1,
    'date' => '2024-04-01',
    'time' => '19:00:00',
    'guests' => 2,
    'status' => 'Pending'
]);

// Fetch all reservations
$reservations = $reservationDao->getAll();
print_r($reservations);

// Insert a new review
$reviewDao->insert([
    'user_id' => 1,
    'menu_item_id' => 1,
    'rating' => 5,
    'comment' => 'Delicious and well-prepared!',
    'created_at' => date('Y-m-d H:i:s')
]);

// Fetch all reviews
$reviews = $reviewDao->getAll();
print_r($reviews);
?>