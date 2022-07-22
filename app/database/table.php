<?php
namespace App\Create;


class Table
{
static function create($tablename){

if (file_exists("./database/".$tablename.".php")) {
    echo "Table already exists";
}else {

            $numbers = file_get_contents("./app/database/template.txt");
            $filename = './database/'.$tablename.'.php';

            $f = fopen($filename, 'wb');
            fputs($f, $numbers);
            fclose($f);
    
}




}





}
