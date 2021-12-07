<?php if (!defined('SITE')) exit('No direct script access allowed.');


class Config
{
	static function get()
	{
	   
        
        $config = array(
            
            // настройки подключения к БД
            "host"   => "localhost",     // хост
            "dbname" => "bejee-test",    // имя БД
            "uname"  => "invest",        // логин
            "upass"  => "invest",        // пароль
            
            "on_page" => 3,
            
            //параметры(по умолчанию)
            "base_url"   => "http://php-mvc", 
            
            "solt"   => "keyasdac235tgw", // соль, добавляется для создания и шифрования пароля и каптчи
            "template" => "template_1" // название папки шаблона в папке views
        );
        
        
       return $config; 
        
    }
    
}

?>