<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');


$method = $_SERVER["REQUEST_METHOD"];

// switch $method {
//     case 'PUT':
//         asdasdasd
// }

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

$response = [
    'value' => 0,
    'error' => 'All good',
    'data' => null,
];

if ($contentType === 'application/json') {
    $content = trim(file_get_contents('php://input'));

    $decoded = json_decode($content, true);

    if (is_array($decoded)) {

        $response['data'] = $decoded;


        $response['value'] = 1;
        $response['error'] = null;

        // $id = $decoded["id"];

        // sql query 

        // $response['data'] = [
        //     $_SERVER["REQUEST_METHOD"]
        // ];


        // $response['value'] = 1;
        // $response['error'] = null;
    } else {
        $response['error'] = 'Bad JSON';
    }
} else {
    $response['error'] = 'Content type is not "application/json"';
}

echo json_encode($response);
