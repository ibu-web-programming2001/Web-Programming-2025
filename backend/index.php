<?php
require 'vendor/autoload.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


Flight::register('restaurantService', 'RestaurantService');

require_once __DIR__ . '/rest/services/RestaurantService.php';

require_once __DIR__ . '/rest/routes/RestaurantRoutes.php';



Flight::start();