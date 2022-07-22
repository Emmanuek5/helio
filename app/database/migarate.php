<?php
namespace App\Database;

class Migrate
{


    static function migrate()
    {
        include "./app/database/databaseconfig.php";
        include "./.envloader.php";
        $files = scandir("./database");
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                include "./database/" . $file;
                
                

                $sql = "CREATE TABLE `".getenv("DATABASE NAME")."`.`".$table ."`( " . $columns . ", PRIMARY KEY (`" . $primaryKey . "`)) ENGINE = InnoDB;";
                echo $sql;
                mysqli_query($con, $sql);
            }
        }
    }
}
