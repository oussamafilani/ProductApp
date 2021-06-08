<?php

include_once '../db.php';


$sql = "SELECT * FROM product ";

$result = mysqli_query($conn, $sql);
$proData = array();

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $proData[] = $row;
  }
} else {
  echo "there no product";
}
echo json_encode($proData);
