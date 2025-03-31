<?php

Flight::route("GET /students", function () {
    Flight::json(Flight::student_service()->get_all());
});

Flight::route("GET /student_by_id", function () {
    Flight::json(Flight::student_service()->get_by_id(Flight::request()->query['id']));
});

Flight::route("GET /students/@id", function ($id) {
    Flight::json(Flight::student_service()->get_by_id($id));
});

Flight::route("DELETE /students/@id", function ($id) {
    Flight::student_service()->delete($id);
    Flight::json(['message' => "Student deleted successfully"]);
});

Flight::route("POST /student", function () {
    $request = Flight::request()->data->getData();
    Flight::json([
        'message' => "Student added successfully",
        'data' => Flight::student_service()->add($request)
    ]);
});

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
