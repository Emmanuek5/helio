<?php 
session_start();
include './load.php';


$filename = $_FILES['pakage']['name'];
$filen = $_FILES['pakage']['tmp_name'];

move_uploaded_file($filen, "./pakage/".$filename);
echo("success");