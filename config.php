<?php

    $siteurl="http://localhost/training/template/";

    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="temp";

    $conn=new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {

    die("Connection Failed: ".$conn->connect_error);
}



?>