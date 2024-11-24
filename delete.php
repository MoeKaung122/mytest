<?php 
require 'config.php';


$pdostatement = $pdo -> prepare("DELETE FROM posts WHERE id =".$_GET['id']);

$pdostatement -> execute();


header("Location:  index.php");



?>