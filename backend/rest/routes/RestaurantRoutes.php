<?php
// Get a specific restaurant by ID
Flight::route('GET /restaurant/@id', function($id){ 
    Flight::json(Flight::restaurantService()->get_restaurant_by_id($id));
});

// Get restaurants with optional location query
Flight::route('GET /restaurant', function(){
    $location = Flight::request()->query['location'] ?? null;
    Flight::json(Flight::restaurantService()->get_restaurants($location));
});

// Add a new restaurant
Flight::route('POST /restaurant', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::restaurantService()->add_restaurant($data));
});

// Update restaurant by ID
Flight::route('PUT /restaurant/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::restaurantService()->update_restaurant($id, $data));
});

// Partially update restaurant by ID
Flight::route('PATCH /restaurant/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::restaurantService()->partial_update_restaurant($id, $data));
});

// Delete restaurant by ID
Flight::route('DELETE /restaurant/@id', function($id){
    Flight::json(Flight::restaurantService()->delete_restaurant($id));
});
?>
