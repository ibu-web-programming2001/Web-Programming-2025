<?php
/**
 * @OA\Get(
 *      path="/restaurant",
 *      tags={"restaurants"},
 *      summary="Get all restaurants",
 *      @OA\Parameter(
 *          name="location",
 *          in="query",
 *          required=false,
 *          @OA\Schema(type="string"),
 *          description="Optional location to filter restaurants"
 *      ),
 *      @OA\Response(
 *           response=200,
 *           description="Array of all restaurants in the database"
 *      )
 * )
 */
Flight::route('GET /restaurant', function(){
   // Flight::auth_middleware()->authorizeRole(Roles::USER);
    $location = Flight::request()->query['location'] ?? null;
    Flight::json(Flight::restaurantService()->get_restaurants($location));
});

/**
 * @OA\Get(
 *     path="/restaurant/{id}",
 *     tags={"restaurants"},
 *     summary="Get restaurant by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the restaurant",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Returns the restaurant with the given ID"
 *     )
 * )
 */
Flight::route('GET /restaurant/@id', function($id){ 

    Flight::json(Flight::restaurantService()->get_restaurant_by_id($id));
});

/**
 * @OA\Post(
 *     path="/restaurant",
 *     tags={"restaurants"},
 *     summary="Add a new restaurant",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "location"},
 *             @OA\Property(property="name", type="string", example="La Trattoria"),
 *             @OA\Property(property="location", type="string", example="Sarajevo"),
 *             @OA\Property(property="cuisine", type="string", example="Italian")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="New restaurant created"
 *     )
 * )
 */
Flight::route('POST /restaurant', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::restaurantService()->add_restaurant($data));
});

/**
 * @OA\Put(
 *     path="/restaurant/{id}",
 *     tags={"restaurants"},
 *     summary="Update an existing restaurant by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Restaurant ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "location"},
 *             @OA\Property(property="name", type="string", example="Updated Name"),
 *             @OA\Property(property="location", type="string", example="New Location"),
 *             @OA\Property(property="cuisine", type="string", example="Fusion")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Restaurant updated"
 *     )
 * )
 */

Flight::route('PUT /restaurant/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::restaurantService()->update_restaurant($id, $data));
});

/**
 * @OA\Patch(
 *     path="/restaurant/{id}",
 *     tags={"restaurants"},
 *     summary="Partially update a restaurant by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Restaurant ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Only name changed"),
 *             @OA\Property(property="location", type="string", example="Only location changed"),
 *             @OA\Property(property="cuisine", type="string", example="Optional")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Restaurant partially updated"
 *     )
 * )
 */
Flight::route('PATCH /restaurant/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::restaurantService()->partial_update_restaurant($id, $data));
});

/**
 * @OA\Delete(
 *     path="/restaurant/{id}",
 *     tags={"restaurants"},
 *     summary="Delete a restaurant by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Restaurant ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Restaurant deleted"
 *     )
 * )
 */
Flight::route('DELETE /restaurant/@id', function($id){
    Flight::json(Flight::restaurantService()->delete_restaurant($id));
});
?>