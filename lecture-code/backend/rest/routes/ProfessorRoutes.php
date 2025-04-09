<?php
/**
 * @OA\Get(
 *     path="/professors",
 *     tags={"professors"},
 *     summary="Return all professors from the API.",
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\Response(
 *         response=200,
 *         description="List of professors."
 *     )
 * )
 */
Flight::route("GET /professors", function () {
    Flight::json(Flight::professor_service()->get_all());
});

/**
 * @OA\Get(
 *     path="/professor_by_id",
 *     tags={"professors"},
 *     summary="Fetch individual professor by ID.",
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\Parameter(
 *         name="id",
 *         in="query",
 *         required=true,
 *         description="Professor ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Fetch individual professor."
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request - missing or invalid ID."
 *     )
 * )
 */
Flight::route("GET /professor_by_id", function () {
    Flight::json(Flight::professor_service()->get_by_id(Flight::request()->query['id']));
});

/**
 * @OA\Get(
 *     path="/professors/{id}",
 *     tags={"professors"},
 *     summary="Fetch individual professor by ID from path.",
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Professor ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Fetch individual professor."
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request - missing or invalid ID."
 *     )
 * )
 */
Flight::route("GET /professors/@id", function ($id) {
    Flight::json(Flight::professor_service()->get_by_id($id));
});

/**
 * @OA\Delete(
 *     path="/professors/{id}",
 *     summary="Delete a professor by ID.",
 *     description="Delete a professor from the database using their ID.",
 *     tags={"professors"},
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Professor ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Professor deleted successfully."
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error."
 *     )
 * )
 */
Flight::route("DELETE /professors/@id", function ($id) {
    Flight::professor_service()->delete($id);
    Flight::json(['message' => "Professor deleted successfully"]);
});

/**
 * @OA\Post(
 *     path="/professor",
 *     summary="Add a new professor.",
 *     description="Add a new professor to the database.",
 *     tags={"professors"},
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\RequestBody(
 *         description="Add new professor",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"name", "department"},
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     example="Professor",
 *                     description="Professor name"
 *                 ),
 *                 @OA\Property(
 *                     property="department",
 *                     type="string",
 *                     example="IT",
 *                     description="Professor department"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Professor has been added."
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error."
 *     )
 * )
 */
Flight::route("POST /professor", function () {
    $request = Flight::request()->data->getData();
    Flight::json([
        'message' => "Professor added successfully",
        'data' => Flight::professor_service()->add($request)
    ]);
});

/**
 * @OA\Patch(
 *     path="/professors/{id}",
 *     summary="Edit professor details",
 *     description="Update professor information using their ID.",
 *     tags={"professors"},
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Professor ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\RequestBody(
 *         description="Updated professor information",
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Demo", description="Professor name"),
 *             @OA\Property(property="department", type="string", example="IT", description="Professor department")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Professor has been edited successfully."
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input data."
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error."
 *     )
 * )
 */
Flight::route("PUT /professor/@id", function ($id) {
    $professor = Flight::request()->data->getData();
    Flight::json([
        'message' => "Professor edited successfully",
        'data' => Flight::professor_service()->update($professor, $id, 'id')
    ]);
});

Flight::route("GET /professors/@name", function ($name) {
    echo "Hello from /Professor route with name= " . $name;
});

Flight::route("GET /professors/@name/@status", function ($name, $status) {
    echo "Hello from /Professor route with name = " . $name . " and status = " . $status;
});
