<?php
require "includes/config.php";
?>
<?php
    session_start();
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

    <title>Оплата</title>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand" href="/"><?php echo $config['title']; ?></a>
        </div>
    </nav>
    <div class="container p-5">
    <p>Через несколько секунд вы будете перенаправленны на страницу оплаты. Нажмите кнопку если не хотите ждать...</p>
    
    <?php if(!empty($_SESSION['payment'])): ?>
    <form id="payment" name="payment" method="post" action="https://sci.interkassa.com/" enctype="utf-8">
        <input type="hidden" name="ik_co_id" value="60b20d953c991b13b66c1e0d" />
        <input type="hidden" name="ik_pm_no" value="<?php echo $_SESSION['payment']['id'];?>" />
        <input type="hidden" name="ik_am" value="<?php echo $_SESSION['payment']['price'];?>" />
        <input type="hidden" name="ik_cur" value="RUB"/>
        <input type="hidden" name="ik_desc" value="Оплата товара" />
        <input type="submit" value="Pay">
    </form>
    <?php endif;?>
    </div>
    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    setTimeout(function(){
        $('form').submit();
    }, 5000)
</script>
			  
</body>

</html>