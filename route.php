<?php 

class Route {


    public static function parse_url(){ 
        $dirname = dirname($_SERVER["SCRIPT_NAME"]);
        $basename = basename($_SERVER["SCRIPT_NAME"]);
        $request_uri = str_replace([ $dirname , $basename ],null,$_SERVER["REQUEST_URI"]);
        return $request_uri;
    }

    public function run($url,$callback,$method = 'get'){ 
        $patterns = [
            '{url}' => '([0-9a-zA-Z]+)',
            '{id}'  => '([0-9]+)' 
        ];

        $url = str_replace(array_keys($patterns),array_values($patterns),$url);

        $request_uri = self::parse_url();
        if(preg_match('@^'.$url.'$@',$request_uri,$parameters)){ 
            unset($parameters[0]);

            if(is_callable($callback)){
                call_user_func_array($callback,$parameters);
            }

            $controller = explode('@',$callback);
            $className  = explode('/',$controller[0]);
            $className  = end($className);
 
            $controllerFile = __DIR__ .'/controller/'. strtolower($controller[0]) . '.php';
            if(file_exists($controllerFile)){
            
                require $controllerFile;
                $class = new $className();
                call_user_func_array([$class, $controller[1]],$parameters);
            }
        }
    }


}



?>