<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Controller_Task extends Controller
{
    
    
    use Functions;
    
    
	function __construct()
	{
        $this->model = new Model_Task();
		$this->view = new View();
	}



    function Action_delete(){


        $id = $this->GetVar('id');
        if(!$id) $this->Redirect();

		$task = $this->model->delete_task($id);	
        
        $this->Redirect('/');
    
    }
	

	function Action_edit()
	{	

        
        $id = $this->GetVar('id');
        if(!$id) $this->Redirect();

        //echo 1; die;
		$task = $this->model->edit_task($id);	
		$this->view->generate('admin/task_edit_view.php','',$task);
        
        

	}
    
	function Action_save()
	{	
    
        //$id = $this->GetVar('id');
        //if(!$id) $this->Redirect();

        $id = $this->PostVar('id');
        if(!$id) $this->Redirect();
        
        $name = $this->PostVar('name');
        $email = $this->PostVar('email');
        $task = $this->PostVar('task');
        $status = $this->PostVar('status');
        
        $this->model->update_task($id,$name,$email,$task,$status);
        
        
        //$this->Redirect('/admin/task/edit/?id='.$id);
        
        $this->Redirect('/');

	}

    
}




?>