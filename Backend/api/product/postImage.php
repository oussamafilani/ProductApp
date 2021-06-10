<?php
// Headers
header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// include_once '../../config/Connect.php';
// include_once '../../models/Product.php';

// Instantiate DB & connect
// $database = new Connect();
// $db = $database->connect();


// Instantiate product object
// $product = new Product($db);

// Get raw posted data
// $data = json_decode(file_get_contents("php://input"));

// var_dump($_FILES);
// exit();


$target_dir = "../../public/assets/img/image_" . basename($_FILES["file"]["name"]);
$uploadOK = 1;

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir)) {
    echo json_encode(
        array('message' =>  "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.")
    );
} else {
    echo json_encode(
        array('message' => 'File Not Created')
    );
}

// if ($_FILES['file']['uploadFile'] === UPLOAD_ERR_OK) { 
//     /**
//     * Do the upload process mentioned above
//     **/
//     } else { 
//     /**
//     * There were an error
//     **/ 
//     } 