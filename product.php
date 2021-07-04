<?php
require "includes/config.php"
?>
<?php
session_start();

$data = $_POST;

if (isset($data['do_order'])) {
    $sql = "INSERT INTO orders (name, email, product, price) VALUES ('".$data['name']."', '".$data['email']."', '".$data['product']."', '" . $data['price'] ."')";

        if (mysqli_query($connection, $sql)) {
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                Заказ совершён
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          $order_id = mysqli_insert_id($connection);
          setPaymentData($order_id);
          header('Location: paymentform.php');
          die;
        } else {
            echo "Ошибка: " . $sql . "<br>" . mysqli_error($connection);
        }
}

function setPaymentData($order_id){
    if(isset($_SESSION['payment'])) unset($_SESSION['payment']);
    $_SESSION['payment']['id'] = $order_id;
    $_SESSION['payment']['price'] = $_POST['price'];
}

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
                    <div class="row">
                        <?php

                        $product = mysqli_query($connection, "SELECT * FROM `products` WHERE `id` = " . (int) $_GET['id']);

                        if (mysqli_num_rows($product) <= 0) {
                        ?>
                            <div class="col-sm-7">
                                <h2>Not found</h2>
                                <p>Sorry link</p>
                            </div>
                        <?php
                        } else {
                            $prod = mysqli_fetch_assoc($product);
                        ?>
                            <div class="col-sm-3">
                                <img class="img-thumbnail" src="static/images/<?php echo $prod['product_img'] ?>" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h2><?php echo $prod['product_name'] ?></h2>
                                <h3><?php echo $prod['product_price'] ?> &#x20bd; <button class="btn btn-info buy" type="submit" data-price="<?php echo $prod['product_price'] ?>" data-product="<?php echo $prod['product_name'] ?>">Купить</button></h3>
                                
                                <h4>Описание</h4>
                                <p><?php echo $prod['product_desc'] ?></p>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </main>
        </div>
        <div class="modal fade" id="buyingModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Оформление заказа</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="buy" method="POST">
                  <div class="mb-3">
                    <label for="name" class="form-label">Ваше имя</label>
                    <input type="name" name="name" class="form-control" id="name" placeholder="Ваше имя" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                  </div>
                  <div class="mb-3">
                    <label for="product" class="form-label">Выбранный товар</label>
                    <input type="text" name="product" class="form-control" id="product" readonly>
                  </div>
                   <div class="mb-3">
                    <label for="price" class="form-label">Стоимость товара</label>
                    <input type="text" name="price" class="form-control" id="price" readonly>
                  </div>
                  <button type="submit" name="do_order" class="btn btn-primary">Оформить заказ</button>
                </form>
              </div>
            </div>
          </div>
        </div>

    </div>






    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    
    <script src="JS/main.js"></script>
</body>

</html>