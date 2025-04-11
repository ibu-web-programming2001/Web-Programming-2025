<?php

/**
 * @OA\Info(
 *     title="API",
 *     description="Restaurant API",
 *     version="1.0",
 *     @OA\Contact(
 *         email="web2001programming@gmail.com",
 *         name="Web Programming"
 *     )
 * )
 */

/**
 * @OA\Server(
 *      url=LOCALSERVER,
 *      description="API server"
 * )
*/
/**
 * @OA\Server(
 *      url=PRODSERVER,
 *      description="API server"
 * )
*/
/**
 * @OA\SecurityScheme(
 *     securityScheme="ApiKey",
 *     type="apiKey",
 *     in="header",
 *     name="Authentication"
 * )
 */
