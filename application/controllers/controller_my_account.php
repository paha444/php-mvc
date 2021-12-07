<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Controller_My_account extends Controller
{
    
	
	function Action_index()
    {	
		$this->view->generate('my_account_view.php', '', $data);
	}
}



?>