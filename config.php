<?php if (!defined('SITE')) exit('No direct script access allowed.');


class Config
{
	static function get()
	{
	   
        
        $config = array(
            
            // ��������� ����������� � ��
            "host"   => "localhost",     // ����
            "dbname" => "bejee-test",    // ��� ��
            "uname"  => "invest",        // �����
            "upass"  => "invest",        // ������
            
            "on_page" => 3,
            
            //���������(�� ���������)
            "base_url"   => "http://php-mvc", 
            
            "solt"   => "keyasdac235tgw", // ����, ����������� ��� �������� � ���������� ������ � ������
            "template" => "template_1" // �������� ����� ������� � ����� views
        );
        
        
       return $config; 
        
    }
    
}

?>