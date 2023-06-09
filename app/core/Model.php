<?php
namespace App\Core;



class Model extends Database{
  
    protected $table;
 

    public function first(){
        return $this->query->fetch_assoc();
    }

    public function get(){
        return $this->query->fetch_all(MYSQLI_ASSOC);

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
        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql)->get();
    }

    public function find(string|int $id){
        $sql = "SELECT * FROM {$this->table} where id = ?";
        return $this->query($sql,[$id],"i");
    }

    public function where(string $column,string $operator, $value = null){
        if($value == null){
            $value = $operator;
            $operator = "=";
        }
        $sql    =   "SELECT * FROM {$this->table} where {$column} {$operator} ?";
        $this->query($sql,[$value],"s");
        return $this;
    }

    public function create(array $data){
        $columns = array_keys($data);
        $columns = implode(", ",$columns);
        $values = array_values($data);
        // $values = "'".implode("', '",$values)."'";
       
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES (".str_repeat("?, ",count($values)-1)."?)";
        $this->query($sql,$values);
        $insert_id =  $this->connection->insert_id; // mostrar id
        return  $this->find($insert_id)->first();
    }

    public function update(string|int $id,array $data){
        $fields = [];
        foreach($data as $key=>$value){
                $fields[] = "{$key} = ?";
        }
        $fields= implode(", ", $fields);
        $sql = "UPDATE {$this->table} set {$fields} WHERE id = ? ";
        $values = array_values($data);
        $values[]    =   $id;
        $this->query($sql,$values);
        return $this->find($id)->first();
    }

    public function delete(string|int $id){
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $this->query($sql,[$id],"i");
        // return $this->query;
    }

 
}