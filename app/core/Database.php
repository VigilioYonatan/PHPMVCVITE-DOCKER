<?php
namespace App\Core;

use mysqli;

class Database{
       
        protected $db_host  =   DB_HOST;
        protected $db_user  =   DB_USER;
        protected $db_pass  =   DB_PASS;
        protected $db_name  =   DB_NAME;

        protected $connection;
        protected $query;
        
        public function __construct()
        {
           $this->connection();
        }

        public function connection(){
            $this->connection   =   new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
            
            if($this->connection->connect_error){
                die("Error de conexión:".$this->connection->connect_error);
            }
        }
        public function query(string $query,$data=[],$params=null){
            if($data){
                if($params == null){
                    $params = str_repeat("s",count($data));
                }
                $stmt   =   $this->connection->prepare($query);
                $stmt->bind_param($params,...$data);
                $stmt->execute();
                $this->query =  $stmt->get_result();
            }else{
                $this->query= $this->connection->query($query);
            }
             return $this;
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
           $this->query("CREATE TABLE IF NOT EXISTS migrations (
               id INT AUTO_INCREMENT PRIMARY KEY,
               migration VARCHAR(255),
               created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
           )  ENGINE=INNODB;");
       }
   
       protected function getAppliedMigrations()
       {
            $this->query("SELECT migration FROM migrations");
          
            $migrations= $this->query->fetch_all();
            return $migrations;
       }

       public function getMigrations(){
        $this->query("SELECT * FROM migrations");
        $migrations= $this->query->fetch_all(MYSQLI_ASSOC);
        return $migrations;
       }
       public function getTables(){
        $this->query("Show tables");
        $results= $this->query->fetch_all(MYSQLI_ASSOC);
        return $results;
       }
       public function count(string $table){
        $this->query("SELECT COUNT(*) as count FROM $table");
        $result= $this->query->fetch_assoc();
        return $result;
       }
   
       protected function saveMigrations(array $newMigrations)
       {
           $str = implode(',', array_map(fn($m) => "('$m')", $newMigrations));
           $statement = $this->connection->prepare("INSERT INTO migrations (migration) VALUES 
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