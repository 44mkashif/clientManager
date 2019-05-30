<?php

    define('ROOT_URL', 'http://localhost/phpsandbox/clientAddressBook');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'adnim');
    define('DB_NAME', 'db_clientaddressbook');
     
    //Create Connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Check Connection
    if(mysqli_connect_errno()){
        echo 'Failed to connect to MySQL '. mysqli_connect_errno();    
    }
 ?>