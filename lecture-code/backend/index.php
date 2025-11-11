<?php
require "./vendor/autoload.php";
require "rest/services/StudentServicev3.php";
require "rest/services/ProfessorServicev1.php";
require "rest/services/AuthService.php";
require "middleware/AuthMiddleware.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

Flight::register('student_service', "StudentServicev3");
Flight::register('professor_service', "ProfessorServicev1");
Flight::register('auth_service', "AuthService");
Flight::register('auth_middleware', "AuthMiddleware");

Flight::route('/*', function() {
    if(
        strpos(Flight::request()->url, '/auth/login') === 0 ||
        strpos(Flight::request()->url, '/auth/register') === 0
    ) {
        return TRUE;
    } else {
        try {
            $token = Flight::request()->getHeader("Authentication");
            if(Flight::auth_middleware()->verifyToken($token))
                return TRUE;
        } catch (\Exception $e) {
            Flight::halt(401, $e->getMessage());
        }
    }
});

require_once 'rest/routes/AuthRoutes.php';
require_once 'rest/routes/StudentRoutes.php';
require_once 'rest/routes/ProfessorRoutes.php';

Flight::start();
