<?php if (!defined('SITE')) exit('No direct script access allowed.');

class View
{
	
    public $User;
    public $data;
    public $config;
    

	function __construct()
	{
	    $this->User = new User();
        $this->User->CheckAuth();
        
        $this->config = Config::get();

        $this->language_ru = Language_ru::get();

	}
    
	function generate($content_view, $template_view, $data = null, $message = null)
	{
        
        $this->data = $data;
        
        $this->message = $message;

		include 'application/views/'.$content_view;
	}
}





?>