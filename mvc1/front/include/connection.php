<?php

    $servername = "localhost";
    $username="root";
    $password="";
    $dbname="notes_marketplace";

    $connection = mysqli_connect($servername, $username, $password, $dbname);
    
    if(!$connection){
        echo "connection Failed" .mysqli_connect_error();
    }

?>