<?php
namespace App\Controllers\Resources;
use App\Core\Controller;

class WebController extends Controller{
    public function home(){
        return $this->render("web.home");
    }
  
  
}