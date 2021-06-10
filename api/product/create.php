<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Connect.php';
include_once '../../models/Product.php';

// Instantiate DB & connect
$database = new Connect();
$db = $database->connect();


// Instantiate product object
$product = new Product($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$product->title = $data->title;
$product->image = $data->image;
$product->description = $data->description;
$product->price = $data->price;
$product->category = $data->category;

// Create product
if ($product->create()) {
    echo json_encode(
        array('message' => 'product Created')
    );
} else {
    echo json_encode(
        array('message' => 'product Not Created')
    );
}
