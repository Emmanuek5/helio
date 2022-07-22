<?php
namespace App\Database;

class Config
{
    static function connect(){
        $host = "getenv('DATABASE HOST')";
        $user = "getenv('DATABASE USER')";
        $pass = getenv("DATABSE PASSWORD");
        $db = getenv("DATABASE NAME");


        $con = mysqli_connect($host, $user, $pass, $db);

        if ($con) {
            # code...
        } else {
            echo ("Connection failed");
        }
        return $con;
    }
}
