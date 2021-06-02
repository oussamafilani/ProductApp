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

  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      let productCount = 4;
      do {
        $("#products").load("load-products.php", {
          productNewCount: productCount
        })
      } while (productCount < 4);
      $("#btn_load").click(function() {
        productCount += 4;
        console.log(productCount);
        $("#products").load("load-products.php", {
          productNewCount: productCount

        });
        if (productCount >= 40) {
          $("#btn_load").remove();
        }
      });
    });
  </script>
</head>

<body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
  <div class="container">
    <div class="row" id="products">


    </div>
  </div>
  <div class="col text-center btn-load">
    <button type="button" id="btn_load" class="btn btn-primary">Load more</button>
  </div>


  <!-- <script type="text/javascript" src="js/main.js"></script> -->
</body>

</html>