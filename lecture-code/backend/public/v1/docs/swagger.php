<?php

require __DIR__ . '/../../../vendor/autoload.php';
use OpenApi\Annotations as OA;

define('BASE_URL', 'http://localhost:83/project/backend/');

//$openapi = \OpenApi\Generator::scan([ __DIR__ . '/../../../rest/routes/']);
//$openapi = \OpenApi\Generator::scan([__DIR__ . '/../../../rest/routes/StudentRoutes.php']);

$openapi = \OpenApi\Generator::scan([
    __DIR__ . '/doc_setup.php',
    __DIR__ . '/../../../rest/routes'
]);
header('Content-Type: application/json');
echo $openapi->toJson();
?>