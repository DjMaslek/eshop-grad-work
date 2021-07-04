<?php

require_once 'rb.php';

/*$db = {
    'dsn' => 'mysql:host=localhost;dbname=f0545805_shop',
    'user' => 'f0545805_shop',
    'pass' => 'shop',
};
R::setup($db['dsn'], $db['user'], $db['pass']);
*/

R::setup('mysql:host=localhost;dbname=f0545805_shop', 'f0545805_shop', 'shop');
R::freeze(true);