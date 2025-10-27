<?php
Flight::route("GET /professors", function () {
    Flight::json(Flight::professor_service()->get_all());
});

Flight::route("GET /professor_by_id", function () {
    Flight::json(Flight::professor_service()->get_by_id(Flight::request()->query['id']));
});

Flight::route("GET /professors/@id", function ($id) {
    Flight::json(Flight::professor_service()->get_by_id($id));
});

Flight::route("DELETE /professors/@id", function ($id) {
    Flight::professor_service()->delete($id);
    Flight::json(['message' => "Professor deleted successfully"]);
});

Flight::route("POST /professor", function () {
    $request = Flight::request()->data->getData();
    Flight::json([
        'message' => "Professor added successfully",
        'data' => Flight::professor_service()->add($request)
    ]);
});

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

