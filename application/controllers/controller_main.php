<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Controller_Main extends Controller
{
    
    
    use Functions;
    
    
	function __construct()
	{
        $this->model = new Model_Main();
		$this->view = new View();
        
        $this->message = $this->getMessage();
	}
	

	function Action_index()
	{	
	   
        //print_r($this->message);
       
        $page = $this->GetVar('page');
        if(!$page) $page = 1;
        
        $sort_by = 'id';
        $order_by = 'desc';
        
        if($this->GetVar('sort_by')) $sort_by = $this->GetVar('sort_by');
        if($this->GetVar('order_by')) $order_by = $this->GetVar('order_by');
        
		$data = $this->model->get_data($page,$sort_by,$order_by);	
		$this->view->generate('main_view.php', '', $data, $this->message);
       
	}
}




?>