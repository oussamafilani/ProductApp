<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Connect.php';
include_once '../../models/Product.php';

// Instantiate DB & connect
$database = new Connect();
$db = $database->connect();


// Instantiate product object
$product = new Product($db);


// Get ID
$product->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get PRODUCT
$product->read_single();

// Create array
$product_arr = array(
    'id' => $product->id,
    'title' => $product->title,
    'image' => $product->image,
    'description' => $product->description,
    'price' => $product->price,
    'category' => $product->category
);

// Make JSON
print_r(json_encode($product_arr));
