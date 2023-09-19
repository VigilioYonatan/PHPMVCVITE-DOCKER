<?php
namespace App\Controllers\Resources;
use App\Core\Controller;
use App\Models\User;

class WebController extends Controller{
    public function home(){
        $users = new User();
        $data=$users->all();
        return $this->render("web.test",[
            "title"=>"home",
            "users"=>$data
        ]);
    }
}