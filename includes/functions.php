<?php

$data = [
    'name' => '',
    'email' => '',
    'product' => '',
    'price' => ''
];

if(!empty($_POST)){
    $data = load($_POST);
    $order_id = save('orders', $data);
    /*var_dump($order_id);*/
}

function load($data){
    foreach($_POST as $k => $v){
        if(array_key_exists($k, $data)){
            $data[$k] = $v;
        }
    }
    return $data;
}

function save($table, $data){
    $sql = "INSERT INTO ". $table ." (name, email, product, price,) VALUES ('".$data['username']."', '".$data['email']."', '".$data['product']."', '" . $data['price'] ."')";

        if (mysqli_query($connection, $sql)) {
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                Вы успешно зарегистрированы
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } else {
            echo "Ошибка: " . $sql . "<br>" . mysqli_error($connection);
        }
}
/*
function save($table, $data){
    $tbl = R::dispense($table);
    foreach($data as $k => $v){
        $tbl->$k = $v;
    }
    return R::store($tbl);
}
function debug($data){
    echo '<pre>'. print_r($data, true) . '</pre>';
}*/
