<?php
require "./vendor/autoload.php";
require "rest/services/StudentServicev3.php";
require "rest/services/ProfessorServicev1.php";
require "rest/services/AuthService.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

Flight::register('student_service', "StudentServicev3");
Flight::register('professor_service', "ProfessorServicev1");
Flight::register('auth_service', "AuthService");

Flight::route('/*', function() {
    if(
        strpos(Flight::request()->url, '/auth/login') === 0 ||
        strpos(Flight::request()->url, '/auth/register') === 0
    ) {
        return TRUE;
    } else {
        try {
            $token = Flight::request()->getHeader("Authentication");
            if(!$token)
                Flight::halt(401, "Missing authentication header");

            $decoded_token = JWT::decode($token, new Key(Config::JWT_SECRET(), 'HS256'));

            Flight::set('user', $decoded_token->user);
            Flight::set('jwt_token', $token);
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
