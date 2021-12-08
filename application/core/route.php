<?php if (!defined('SITE')) exit('No direct script access allowed.');


class Route
{
    
    use Functions;
    

    public $User;
    public $config;
    
    

	function __construct()
	{
        $this->config = Config::get();
       
        $this->User = new User();
        $this->User->CheckAuth(); 
        
	}
    
	function start()
	{
	    
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);
        //print_r($routes);
        
        $admin = '';
        
        switch ($routes[1]){

            case "admin":       
                
                $admin = 'admin/';
                
                if($this->User->role=='admin'){
            		if ( !empty($routes[2]) )
            		{	
                        $controller_name = $routes[2];
                    }
    
            		if ( !empty($routes[3]) )
            		{
            			$action_name = $routes[3];
            		}   
                }         
            
            break;
            
            case "my_account":       
                if($this->User->status_auth){
                    $controller_name = 'my_account';
                }else{
                    $this->Redirect('/');
                }
            break;
            
            case "login":       
                
                $controller_name = 'login';
    
            break;
            
            case "registration":       

                $controller_name = 'registration';
    
            break;
            
            case "tasks":       

            break;
            
            
            case "task":       
                
                $controller_name = 'task';    
                
                switch ($routes[2]){
                    
                    case "create":  
                        
                        $action_name = 'create';
                    
                    break;

                    case "save":  
                        
                        $action_name = 'save';
                    
                    break;
                }
    
            
            break;


            case "action": ///// Для POST форм 
                switch ($routes[2]) {
                     case "login":
                         $this->User->Auth();
                     break;
                     case "logout":
                         $this->User->U_Exit();
                     break;
                     case "registration":
                         $this->User->Register();
                     break;
                     case "update_user":
                         $this->User->Update_user();
                     break;
                }                
            break; //////////            
        
        
        }

        //echo $controller_name, $action_name; 

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'Action_'.$action_name;

		// подключаем модель если она есть
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$admin.$model_file;
		if(file_exists($model_path))
		{
			include_once "application/models/".$admin.$model_file;
		}
		// подключаем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$admin.$controller_file;
		if(file_exists($controller_path))
		{
			include_once "application/controllers/".$admin.$controller_file;
		}else{
			Route::ErrorPage404();
		}
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
        }else{
			
			Route::ErrorPage404();
		}

  
	
	}
	
	function ErrorPage404()
	{
        $host = $this->config['base_url'];
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'/404');
    }
}









?>