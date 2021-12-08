<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Controller_404 extends Controller
{

	function __construct()
	{
		//$this->model = new Model_Main();
		$this->view = new View();
	}
	


	function Action_index()
	{	
	   
        
       
       
        //$page = $this->GetVar('page');
        //if(!$page) $page = 1;
        
        //$sort_by = $this->GetVar('sort_by');
        //$order_by = $this->GetVar('order_by');
        
        //$this->index(1,'name','asc');       
       
       
       
       
       
       
		//$data = $this->model->get_data(1,'name','asc');	
        
        	
		$this->view->generate('404_view.php', 'template_view.php', '');
       
       
       
       
       
		//$this->view->generate('main_view.php', 'template_view.php');
	}
}




?>