<?php

// Your API token (example)
$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjp7ImlkIjoiNiIsImVtYWlsIjoiZGVtb0RhZG1pbkBnbWFpbC5jb20iLCJyb2xlIjoiYWRtaW4iLCJkZXBhcnRtZW50X2lkIjoiMCJ9LCJpYXQiOjE3NDU3NDc5NzAsImV4cCI6MTc0NTgzNDM3MCwicm9sZSI6ImFkbWluIn0.55HiMTuPeEMKZ9yumOxdp3n9pYbNz1ucylfPDkTjY9I";
// Initialize cURL session
$curl = curl_init();

// Set options
curl_setopt_array($curl, [
    CURLOPT_URL => "http://localhost:83/project/backend/students",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authentication:" . $token,  
        "Accept: application/json"       // (Optional) specify you want JSON
    ]
]);

// Execute the request
$response = curl_exec($curl);

// Check for errors
if (curl_errno($curl)) {
    echo 'cURL error: ' . curl_error($curl);
} else {
    echo $response;
}

// Close the session
curl_close($curl);
