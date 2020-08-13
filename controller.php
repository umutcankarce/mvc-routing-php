<?php 


class Controller { 

 // BaseController 
public function view($viewName,$data = []){
   require __DIR__ . '/view/'. strtolower($viewName) . '.php';
   new $viewName();
}

public function model($modelName){ 
    require __DIR__ . '/model/'. strtolower($modelName) . '.php';  
    new $modelName();  
}

public function helper($helperName){
    require __DIR__ . '/helper/'. strtolower($helperName) . '.php';
    new $helperName(); 
}

}



?>   

