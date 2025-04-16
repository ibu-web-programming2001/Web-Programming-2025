<?php
require_once __DIR__ . '/../../data/Roles.php';

/**
 * @OA\Get(
 *     path="/students",
 *     tags={"students"},
 *     summary="Return all students from the API.",
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\Response(
 *         response=200,
 *         description="List of students."
 *     )
 * )
 */
Flight::route("GET /students", function () {
    //Flight::json(Flight::request()->getHeaders());
    Flight::auth_middleware()->authorizeRole(Roles::USER);
    //$user = Flight::get('user');
    //Flight::json(Flight::student_service()->get_all($user->id));
    Flight::json(Flight::student_service()->get_all());
});

/**
 * @OA\Get(
 *     path="/student_by_id",
 *     tags={"students"},
 *     summary="Fetch individual student by ID.",
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\Parameter(
 *         name="id",
 *         in="query",
 *         required=true,
 *         description="Student ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Fetch individual student."
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Bad request - missing or invalid ID."
 *     )
 * )
 */
Flight::route("GET /student_by_id", function () {
    Flight::json(Flight::student_service()->get_by_id(Flight::request()->query['id']));
});

/**
 * @OA\Get(
 *     path="/students/{id}",
 *     tags={"students"},
 *     summary="Fetch individual student by ID from path.",
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Student ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Fetch individual student."
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Bad request - missing or invalid ID."
 *     )
 * )
 */
Flight::route("GET /students/@id", function ($id) {
    Flight::json(Flight::student_service()->get_by_id($id));
});

/**
 * @OA\Delete(
 *     path="/students/{id}",
 *     summary="Delete a student by ID.",
 *     description="Delete a student from the database using their ID.",
 *     tags={"students"},
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Student ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Student deleted successfully."
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error."
 *     )
 * )
 */
Flight::route("DELETE /students/@id", function ($id) {
    Flight::student_service()->delete($id);
    Flight::json(['message' => "Student deleted successfully"]);
});

/**
 * @OA\Post(
 *     path="/student",
 *     summary="Add a new student.",
 *     description="Add a new student to the database.",
 *     tags={"students"},
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\RequestBody(
 *         description="Add new student",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"name", "email"},
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     example="Student",
 *                     description="Student name"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     example="demo@gmail.com",
 *                     description="Student email"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Student has been added."
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error."
 *     )
 * )
 */
Flight::route("POST /student", function () {
    $request = Flight::request()->data->getData();
    $response = Flight::student_service()->add($request);
    if(count($response) > 0){
        Flight::json([
            'message' => "Student added successfully",
            'data' => $response
        ]);
    } else {
        Flight::json([
            'message' => "Email already exists",
            'data' => []
        ]);
    }
});

/**
 * @OA\Patch(
 *     path="/students/{id}",
 *     summary="Edit student details",
 *     description="Update student information using their ID.",
 *     tags={"students"},
 *     security={
 *         {"ApiKey": {}}
 *     },
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Student ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\RequestBody(
 *         description="Updated student information",
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(
 *              property="name", 
 *              type="string", 
 *              example="Demo", 
 *              description="Student name"
 *             ),
 *             @OA\Property(property="email", type="string", example="demo@gmail.com", description="Student email")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Student has been edited successfully."
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
Flight::route("PATCH /student/@id", function ($id) {
    $student = Flight::request()->data->getData();
    Flight::json([
        'message' => "Student edited successfully",
        'data' => Flight::student_service()->update($student, $id, 'id')
    ]);
});

Flight::route("GET /students/@name", function ($name) {
    echo "Hello from /students route with name= " . $name;
});

Flight::route("GET /students/@name/@status", function ($name, $status) {
    echo "Hello from /students route with name = " . $name . " and status = " . $status;
});
