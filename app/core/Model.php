<?php
namespace App\Core;

use PDO;

class Model {
  
    protected $table;
    protected $fillable;
    protected $created_at = "created_at";
    protected $updated_at = "updated_at";
    
    public Database $db;
    public Validators $validator;

    public function __construct() {
        $this->db= new Database();
        $this->validator = new Validators();
        // $this->validator= new Validator($this->db);
    }
 

    public function first(){
        return $this->db->query->fetch(PDO::FETCH_OBJ);
    }

    public function get(){
      return  $this->db->query->fetchAll(PDO::FETCH_OBJ); 
    }
  
   
    public function query(string $query,$data=[]){
 
        if($data){
            $stmt   =   $this->db->prepare($query);
            foreach ($data as $key => $value) {
                $stmt->bindValue(":{$key}",$value);
            }
            $stmt->execute($data);
            $this->db->query =$stmt;
        }else{
            $this->db->query= $this->db->connection->query($query);
            
        }

        return $this;
    }
    public function paginate(int $limit = 15){
        $page=$_GET["page"] ?? 1;
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table} LIMIT ".($page - 1) * $limit.",{$limit}";
        $data= $this->query($sql)->get();
        $total = $this->query("SELECT FOUND_ROWS() AS total")->first()["total"];
        $uri = $_SERVER["REQUEST_URI"];
        $uri = trim($uri,"/");
        if(strpos($uri,"?")){
            $uri = substr($uri,0,strpos($uri,"?"));
        }   
        $last_page  = ceil($total / $limit);
        $next_page_url=  $page < $last_page ? "/".$uri."?page=".$page+1 : null;
        $prev_page_url= $page > 1 ?  "/".$uri."?page=".$page-1: null;
        return [
            "total"         =>$total,
            "from"          =>($page - 1) * $limit + 1, // 4
            "to"            =>($page-1) * $limit + count($data), //6
            "next_page_url" =>$next_page_url,
            "prev_page_url" => $prev_page_url,
            "data"=>$data,
        ];
    }

    // consultas
    public function all(){
        $sql = "SELECT * FROM ".$this->table;
        return $this->query($sql)->get();
    }

    public function find(string|int $id){
        $sql = "SELECT * FROM {$this->table} where id = :id";
        return $this->query($sql,["id"=>$id]);
    }
    public function findByPK(string|int $id){
        $sql = "SELECT * FROM {$this->table} where id = :id LIMIT 1";
        return $this->query($sql,["id"=>$id])->first();
    }

    public function where(string $column,string $operator, $value = null){
        if($value == null){
            $value = $operator;
            $operator = "=";
        }
        $sql    =   "SELECT * FROM {$this->table} where {$column} {$operator} :value";
        $this->query($sql,["value"=>$value]);
        return $this;
    }

    public function create(array $data){
        if($this->fillable){
            $data = array_intersect_key($data, array_flip($this->fillable));
        }
        if($this->created_at){
            $data[$this->created_at]=date('Y-m-d H:i:s');
        }
        if($this->updated_at){
            $data[$this->updated_at]=date('Y-m-d H:i:s');  
        }

        $columns = array_keys($data);
        $values = implode(", :",$columns);
        $columns = implode(", ",$columns);
      
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES (:{$values})";
        $this->query($sql,$data);
        $insert_id =  $this->db->connection->lastInsertId(); // mostrar id
        return  $this->find($insert_id)->first();
    }

    public function update(string|int $id,array $data){
      
        if($this->updated_at){
            $data[$this->updated_at]=date('Y-m-d H:i:s');  
        }
        $fields = [];
        foreach($data as $key=>$value){
                $fields[] = "{$key} = :$key";
        }
        $fields= implode(", ", $fields);
        $sql = "UPDATE {$this->table} set {$fields} WHERE id = :id ";
        $data["id"]    =   $id;
        $this->query($sql,$data);
        return $this->find($id)->first();
    }

    public function delete(string|int $id){
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $this->db->query($sql,[$id],"i");
        // return $this->db->query;
    }

 
}