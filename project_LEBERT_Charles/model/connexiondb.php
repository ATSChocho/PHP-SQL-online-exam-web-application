<?php
$servername = "127.0.0.1:49458";
$dbname = "project";
$username = "azure";
$password = "6#vWHD_$";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>