<?php

use App\Core\Database;

class m0002_create_images_table extends Database{
    public function up(){
        $SQL = "CREATE TABLE images (
                url VARCHAR(100) NOT NULL,
                imagesables_type VARCHAR(100) NOT NULL,
                imagesables_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $this->query($SQL);
    }
    
    public function down(){
        $SQL = "DROP TABLE images;";
        $this->query($SQL);
    }
}