<?php

use App\Core\Database;

class m0001_initial extends Database{
    public function up(){
        $SQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status TINYINT DEFAULT 0,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $this->query($SQL);
    }
    
    public function down(){
        $SQL = "DROP TABLE users;";
        $this->query($SQL);
    }
}