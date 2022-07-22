<?php
use \App\Database\Table;

    $table = 'template';
     $primaryKey = 'id';
     $columns = [
        'id' => ['type' => 'int', 'autoIncrement' => true],
        'name' => ['type' => 'string', 'length' => 255],
        'description' => ['type' => 'string', 'length' => 255],
        'content' => ['type' => 'string', 'length' => 255],
        'created_at' => ['type' => 'datetime'],
        'updated_at' => ['type' => 'datetime'],
    ];
   
    