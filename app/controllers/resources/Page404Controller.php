<?php
namespace App\Controllers\Resources;
use App\Core\Controller;

class Page404Controller extends Controller{
    public function index(){
        http_response_code(404);
        return $this->render("web.404");
    }
}