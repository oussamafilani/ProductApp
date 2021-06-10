<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Connect.php';
include_once '../../models/Product.php';

// Instantiate DB & connect
$database = new Connect();
$db = $database->connect();

// Instantiate blog post object
$product = new Product($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$product->id = $data->id;

$product->title = $data->title;
$product->image = $data->image;
$product->description = $data->description;
$product->price = $data->price;
$product->category = $data->category;

// Update post
if ($product->update()) {
    echo json_encode(
        array('message' => 'product Updated')
    );
} else {
    echo json_encode(
        array('message' => 'product Not Updated')
    );
}
