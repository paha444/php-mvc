<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Controller_Login extends Controller
{   
    use Functions;

	function __construct()
	{

		$this->view = new View();
        
        $this->message = $this->getMessage();
        
        print_r($this->message);
	}
	
	function Action_index()
	{
	
		$this->view->generate('login_view.php', '', $data, $this->message);
	}
}



?>