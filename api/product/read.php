<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Connect.php';
include_once '../../models/Product.php';

// Instantiate DB & connect
$database = new Connect();
$db = $database->connect();

// Instantiate blog post object
$post = new Product($db);

// Blog post query
$result = $post->read();
// Get row count
$num = $result->rowCount();

// Check if any posts
if ($num > 0) {
    // Post array
    $posts_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'image' => $image,
            'description' => $description,
            'price' => $price,
            'category' => $category
        );

        // Push to "data"
        array_push($posts_arr, $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);
} else {
    // No Posts
    echo json_encode(
        array('message' => 'No Product Found')
    );
}
