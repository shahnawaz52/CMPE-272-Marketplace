<?php

    $connection = mysqli_connect('localhost', 'root', '', 'marketplace');
    if(!$connection) {
        die(mysqli_connect_error($connection));
        // echo "Connection Successful";
    }

?>