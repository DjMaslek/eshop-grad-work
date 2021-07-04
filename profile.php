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

    <title>Hello, world!</title>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand" href="/"><?php echo $config['title']; ?></a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <nav class="nav col-md-2 flex-column bg-light sidebar">
                <div class="sidebar-sticky">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Мои Заказы</a>
                        </li>
                </div>
            </nav>
            <!-- maincontent -->
            <main role="main" class="col-lg-10 p-4">
                <div class="border-bottom">
                    <h1 class="h2">Профиль</h1>
                    <div class="row">
                        <h4><?php 
                        if(isset($_SESSION['logged_user'])){
                            echo 'Привет, '.$_SESSION['logged_user']['username'] . '!';
                        }
                        ?></h4>
                        <a href="/logout.php">Выйти</a>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>