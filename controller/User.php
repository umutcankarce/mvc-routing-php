<?php 

class User extends Controller { 

    public function index(){ 
        $this->view("UserView");
    }

    public function profile($name = null){ 
        echo 'Hoşgeldin, ' . $name;
    }

    public function delete($id){
        $this->model("User");
        $this->model->get("user",$id);
    }

}



?>