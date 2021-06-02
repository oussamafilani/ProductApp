<?php

include_once 'db.php';

$productNewCount = $_POST['productNewCount'];

$sql = "SELECT * FROM product LIMIT $productNewCount";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-md-3">
          <div class="ibox">
            <div class="ibox-content product-box">
              <div class="product-imitation">
                <img src="';
    echo "img/" . $row['image'];
    echo '" />
              </div>
              <div class="product-desc">
                <span class="product-price">';
    echo $row['price'];
    echo '</span><small class="text-muted">';
    echo $row['category'];
    echo ' </small><a href="#" class="product-name">';
    echo $row['title'];
    echo '</a>
    
                <div class="small m-t-xs">';
    echo $row['price'];
    echo '
                </div>
                <div class="m-t text-righ">
                  <a
                    href="#"
                    class="btn btn-xs btn-outline btn-primary btn-add__card"
                    >Add to Cart <i class="fa fa-long-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>';
  }
} else {
  echo "there no product";
}
