<?php

namespace App\Controllers;

use App\Core\Controller;


class WebController extends Controller
{
    public function index(){
      return $this->render("web.home",[]);
    }
}