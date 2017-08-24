<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$email = 'hello';
$link = 'test';

echo $email;

require_once('./helper.php');

echo "B";

 db_query("INSERT INTO `Flyer`.`Customers` (`Email`, `Product Key`, `First Launch`) VALUES ('$email', '$link', '0')");

echo "C";




?>
