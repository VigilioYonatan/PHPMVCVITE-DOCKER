<?php
namespace App\Config;
use PDO;
use PDOException;

class Database
{
    private string $HOST = '';
    private string $USER = '';
    private string $PASS = '';
    private string $DB   = '';
    public  $pdo =null;

    function __construct()
    {
        $this->HOST =   $_ENV['DB_HOST'];
        $this->USER =   $_ENV['DB_USER'];
        $this->PASS =   $_ENV['DB_PASS'];
        $this->DB   =   $_ENV['DB_NAME'];      
    }

    function connect(){
        try {
            $this->pdo = new PDO(
                "mysql:host=$this->HOST;dbname=$this->DB",
                $this->USER,
                $this->PASS
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
       
    }
}