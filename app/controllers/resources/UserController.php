<?php
namespace App\Controllers\Resources;
use App\Core\Controller;
use App\Core\Exception\NotFoundException;
use App\Core\Exception\BaseException;
use App\Models\User;

class UserController extends Controller{
    public function show($id){
        if (preg_match('/^[0-9]+$/', $id)) {
            $user = new User();
            $user=$user->findByPK($id);
            if($user){
                return $this->render("web.show",[
                    "user"=>$user,
                    "title"=>$user->name
                ]);
            }
            $this->page404();
        } else {
           $this->page404();
        }
        
    }
    public function edit($id){
        $user = new User();
        $user=$user->findByPK($id);
        return $this->render("web.edit",compact("user"));
    }
    public function update($id){
        $this->csrf();
        $user = new User();
        $user=$user->update($id,$this->all());
        $this->backPage();

    }

    public function store(){
        // dd($this->get("images"));
        $user=new User();
        $errors =   $user->storeValidation($this->all());
        
        // dump($errors->errors);
        // if($errors->isErrors()){
        //     return new NotFoundException($errors->firstError());
        // }
        if($errors->isErrors()){
            return $this->redirect->back()->redirect();
        }
       
        // $files = [];
        // foreach ($_FILES as  $file) {
        //     foreach ($file["tmp_name"] as  $value) {
        //         $image=md5(uniqid()).".jpg";
        //         $files[] = $image;
        //         move_uploaded_file($value, $image);
        //     }
        // }
        // dd($files);

        // die;
        // $user = new User();
        // dump($this->all());
        //   die;
        //     $this->validator->validate($this->all(),["name"=>"required|min:3|max:10|unique:users,name"]);
        //     if($this->validator->isErrors()){
        //         return $this->backPage();
        //     }
          
        //     $user= $user->create($this->all());
        //     $this->redirect("users.show",["id"=>$user->id]);
     
    }
}