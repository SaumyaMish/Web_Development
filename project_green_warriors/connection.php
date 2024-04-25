<?php
 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "greenwarriors_db";

    $connect = mysqli_connect($servername,$username,$password,$dbname);

    if ($connect)
    {
        echo '<p style = "color:red text-align:left;">Connection Stablish.</p>';
    }
    else
    {
        echo "Connection failed.".mysqli_connect_error();
    }
?>