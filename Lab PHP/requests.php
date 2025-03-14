<?php

session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : null;
$name = isset($_REQUEST['name']) && !is_null($_REQUEST['name']) ? $_REQUEST['name'] : null;
$surname = isset($_REQUEST['surname']) && !is_null($_REQUEST['surname']) ? $_REQUEST['surname'] : null;

$response = [
    "status" => "error",
    "message" => "Invalid request"
];


if ($method === "POST") {
    if ($name && $surname) {
        $_SESSION['users'][] = ["name" => $name, "surname" => $surname];
        $response = ["status" => "success", "message" => "User added", "data" => $_SESSION['users']];
    } else {
        $response["message"] = "Missing name or surname";
    }
} elseif ($method === "UPDATE") {
    if ($name && $surname && !empty($_SESSION['users'])) {
        $_SESSION['users'][0] = ["name" => $name, "surname" => $surname]; 
        $response = ["status" => "success", "message" => "User updated", "data" => $_SESSION['users']];
    } else {
        $response["message"] = "No user found or missing parameters";
    }
} elseif ($method === "DELETE") {
    $_SESSION['users'] = [];
    $response = ["status" => "success", "message" => "All users deleted"];
} elseif ($method === "GET") {
    $response = ["status" => "success", "message" => "User data retrieved", "data" => $_SESSION['users']];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
