<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Controller_Registration extends Controller
{
    
    use Functions;
    
	function __construct()
	{

		$this->view = new View();
	}
	
	function Action_index()
	{
	
		$this->view->generate('registration_view.php', '', '');
	}
}



?>