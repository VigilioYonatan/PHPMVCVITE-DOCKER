<?php
namespace App\Core\Exception;

class BaseException {
    public bool $success= false;
    public  int $code = 200;
    public function __construct(string |array $args)
    {
        http_response_code($this->code);
        if(is_array($args)){
            foreach ($args as $key => $value) {
                $this->{$key} = $value;
            }
            return;
        }
        $this->{"message"} = $args;
    }
 
  
  
}