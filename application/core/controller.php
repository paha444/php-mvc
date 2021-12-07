<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Controller {
	
    public $User;
    
	public $model;
	public $view;
	
	function __construct()
	{
	    $this->User = new User();
        
		$this->view = new View();
	}
	

}






?>