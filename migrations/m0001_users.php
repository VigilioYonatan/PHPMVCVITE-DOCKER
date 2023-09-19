<?php

use App\Core\Database;

class m0001_users extends Database{
    public function up(){
        $SQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $this->query($SQL);
    }
    
    public function down(){
        $SQL = "DROP TABLE users;";
        $this->query($SQL);
    }
}