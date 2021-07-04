<?php
require "includes/config.php";
?>

<?php

$data = $_POST;

if (isset($data['do_signup'])) {

    $errors = array();
    if (trim($data['username']) == '') {
        $errors[] = 'Введите имя пользователя';
    }
    if (trim($data['email']) == '') {
        $errors[] = 'Введите Email';
    }
    if ($data['password'] == '') {
        $errors[] = 'Введите пароль';
    }
    if ($data['password_check'] != $data['password']) {
        $errors[] = 'Неверный повторный пароль';
    }

    if(mysqli_num_rows(mysqli_query($connection, "SELECT * FROM users WHERE username='".$data['username']."'"))){
        $errors[] = 'Пользователь с таким именем уже существует';
    }
    if(mysqli_num_rows(mysqli_query($connection, "SELECT * FROM users WHERE email='".$data['email']."'"))){
        $errors[] = 'Пользователь с такой почтой уже существует';
    }
    

    if (empty($errors)) {
        $sql = "INSERT INTO users (username, email, password) VALUES ('".$data['username']."', '".$data['email']."', '".password_hash($data['password'], PASSWORD_DEFAULT)."')";

        if (mysqli_query($connection, $sql)) {
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                Вы успешно зарегистрированы
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } else {
            echo "Ошибка: " . $sql . "<br>" . mysqli_error($connection);
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        ' . array_shift($errors) . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
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

    <title>Hello, world!</title>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand" href="/"><?php echo $config['title']; ?></a>
        </div>
    </nav>

    <div class="container text-center">
        <div class="row justify-content-center vertical-center mt-5">
            <form action="/signup.php" method="POST" class="col-sm-4">
                <h3 class=" mb-3 fw-normal">Регистрация</h3>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="floatingUsername" placeholder="Username" value="<?php echo @$data['username'] ?>">
                    <label for="floatingUsername">Имя пользователя</label>
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" value="<?php echo @$data['email'] ?>">
                    <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Пароль</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password_check" class="form-control" id="floatingPasswordCheck" placeholder="Password">
                    <label for="floatingPasswordCheck">Подтвердите пароль</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="do_signup" type="submit">Зарегистрироваться</button>
            </form>
            <p class="lead mt-5">Уже зарегистрированы? <a href="auth.php">Войти</a> </p>
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