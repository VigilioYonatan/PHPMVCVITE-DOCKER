<?php
namespace App\Core;

use mysqli;
use PDO;

class Database{
       
        protected $db_host  =   DB_HOST;
        protected $db_user  =   DB_USER;
        protected $db_pass  =   DB_PASS;
        protected $db_name  =   DB_NAME;

        public $connection;
        public $query;
        
        public function __construct()
        {
           $this->connection();
        }
        public function query(string $query){
            $this->query= $this->connection->query($query);
    
        }

        public function connection(){
            try {
                $cnx   =  new PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_user,$this->db_pass);
                $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection =$cnx;
            } catch (\PDOException $e) {
                errorMessage("Connection failed: " . $e->getMessage());
                die();
            }
           
        }
       
       public function applyMigrations()
       {
           $this->createMigrationsTable();
           $appliedMigrations = $this->getAppliedMigrations();
   
           $newMigrations = [];
           $files = scandir(__DIR__."/../../migrations");
           $toApplyMigrations = array_diff($files, $appliedMigrations);
           foreach ($toApplyMigrations as $migration) {
               if ($migration === '.' || $migration === '..') {
                   continue;
               }
   
               require_once __DIR__. '/../../migrations/' . $migration;
               $className = pathinfo($migration, PATHINFO_FILENAME);
               $instance = new $className();
               $this->log("Applying migration $migration");
               $instance->up();
               $this->log("Applied migration $migration");
               $newMigrations[] = $migration;
           }
   
           if (!empty($newMigrations)) {
               $this->saveMigrations($newMigrations);
           } else {
               $this->log("There are no migrations to apply");
           }
       }
   
       protected function createMigrationsTable()
       {
        $this->query= $this->connection->query("CREATE TABLE IF NOT EXISTS migrations (
               id INT AUTO_INCREMENT PRIMARY KEY,
               migration VARCHAR(255),
               created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
           )  ENGINE=INNODB;");
       }
   
       protected function getAppliedMigrations()
       {
            $stmt = $this->prepare("SELECT migration FROM migrations");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_COLUMN);
       }

       public function getMigrations(){
        $this->query("SELECT * FROM migrations");
        $migrations= $this->query->fetchAll(PDO::FETCH_ASSOC);
        return $migrations;
       }
       public function getTables(){
        $this->query("SHOW tables");
        $results= $this->query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
       }
       public function count(string $table){
            $this->query("SELECT COUNT(*) as count FROM $table");
            $result= $this->query->fetch();
            return $result;
       }
   
       protected function saveMigrations(array $newMigrations)
       {
           $str = implode(',', array_map(fn($m) => "('$m')", $newMigrations));
           $statement = $this->prepare("INSERT INTO migrations (migration) VALUES 
               $str
           ");
           $statement->execute();
       }
   
       public function prepare($sql)
       {
           return $this->connection->prepare($sql);
       }
   
       private function log($message)
       {
           echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL;
       }
}