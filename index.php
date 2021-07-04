<?php
require "includes/config.php";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php include "favicon.php" ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title><?php echo $config['title']; ?></title>
    <meta name="interkassa-verification" content="3a4cb4b2c472761e723223c2c956da4e" />
</head>

<body>
    <!-- header -->
    <?php include "includes/header.php" ?>

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <?php include "includes/sidebar.php" ?>
            <!-- maincontent -->
            <main role="main" class="col-lg-10 p-4">
                <div class="border-bottom">
                    <h1 class="h2">Новое</h1>
                    <div class="row">
                        <?php
                        $products = mysqli_query($connection, "SELECT * FROM `products`");
                        while (($prod = mysqli_fetch_assoc($products))) {
                        ?>
                            <div class="card col-sm-3 d-sm-inline-block ">
                                <img class="card-img-top" src="static/images/<?php echo $prod['product_img'] ?>" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="text-dark text-decoration-none stretched-link" href="/product.php?id=<?php echo $prod['id']; ?>"><?php echo $prod['product_name']; ?></a></h5>
                                    <h4 class="card-text text-danger"><?php echo $prod['product_price'] ?> ₽</h4>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>