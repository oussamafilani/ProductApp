<?php
include_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>e commerce product list</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- bootstrap -->
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <!-- style css-->
  <link href="css/style.css" rel="stylesheet" />



</head>

<body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
  <div class="container">
    <div class="row" id="products">

      <!-- one product  -->
      <div class="col-md-3">
        <div class="ibox">
          <div class="ibox-content product-box">
            <div class="product-imitation">
              <img src="img/product_imae_1.jpg_.webp">
            </div>
            <div class="product-desc">Lorem Ipsum is simply dummy text of the printing a<span class="product-price">$33</span><small class="text-muted">phone</small><a href="#" class="product-name">iphone</a>

              <div class="small m-t-xs">$33</div>
              <div class="m-t text-righ">
                <a href="#" class="btn btn-xs btn-outline btn-primary btn-card">Add to Cart <i class="fa fa-long-arrow-right"></i>
                </a>
              </div>
              <div class="crud-box">

                <a href="#" class="btn btn-xs btn-outline btn-danger btn-card btn-add__delete">delete <i class="fa fa-trash"></i>
                </a>
                <a href="#" class="btn btn-xs btn-outline btn-success btn-card btn-add__edit float-right">edit <i class="fa fa-edit"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- end one product  -->
    </div>
  </div>
  <div class="col text-center btn-load">
    <button type="button" id="btn_load" class="btn btn-primary">Load more</button>
  </div>

  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="js/main.js"></script> -->
</body>

</html>