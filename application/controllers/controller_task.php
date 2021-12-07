<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Controller_Task extends Controller
{
    
    
    use Functions;
    
    
	function __construct()
	{
        $this->model = new Model_Task();
		$this->view = new View();
	}



	function Action_create()
	{	


		$this->view->generate('create_task_view.php','',$task);
        
        

	}
    
	function Action_save()
	{	
        
        $name = $this->PostVar('name');
        $email = $this->PostVar('email');
        $task = $this->PostVar('task');
        
        $this->model->create_task($name,$email,$task);
        
        
        
        
        $this->Redirect('/');

	}

    
}




?>