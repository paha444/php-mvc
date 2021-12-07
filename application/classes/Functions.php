<?php if (!defined('SITE')) exit('No direct script access allowed.');

////////////////////  В этом классе дополнительные функции сайта, редирект, сообщения, загрузака шаблона, 
///////////////////   генератор случайного имени, фильтрация GET и POST

trait Functions
{
    

    function Redirect($url='/'){
        
        echo'<script language="JavaScript">window.location.href = "'.$url.'"</script>';

        //header("Location: $url"); 
        //exit(); 
        
    }    
    
    function Messages(){
        
        echo '<p>'.$this->message.'</p>';
        
    }

    
    
    function generateCode($length=6) {
    
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    
        $code = "";
    
        $clen = strlen($chars) - 1;  
        while (strlen($code) < $length) {
    
                $code .= $chars[mt_rand(0,$clen)];  
        }
    
        return $code;
    
    }
    
   
    
    ///////// эти 2 функции выводят нужные тексты на нужном языке.
    
    function get_text($string,$param_1=''){
        
        if(isset($this->languages[$string])){
            
            echo sprintf($this->languages[$string],$param_1);
            
        }else{
            echo $string;    
        }
    }
    
    
    function get_text_m($string,$param_1=''){
        
        if(isset($this->languages[$string])){
            
            return $this->languages[$string];
    
        }else{
            return $string;    
        }
    }
    
    ////////////////
    
    
    
    function setMessage($message) { 	
        
        session_start();
        
        $_SESSION['type'] = $message['type'];
        $_SESSION['message'] = $message['message'];
        
        $m = '';
        if($message['m']){
            
            foreach($message['m'] as $value){
                $m .=$value;
            }
            
        }
        
        $_SESSION['m'] = $m;
        
        //echo $_SESSION['message'];
    }
    
    
    function getMessage() { 	
        
        session_start();
        
        if(isset($_SESSION['message'])){
            //$this->message_type = $_SESSION['type'];
            //$this->message = $_SESSION['message'];
            //unset($_SESSION['message']);
            
            
            //echo $_SESSION['message'];
            
            $data = ['type'=>$_SESSION['type'], 'message'=>$_SESSION['message']];
            
            unset($_SESSION['message']);
            
            return $data;
        }
        
        
        
    }
    
    
    function CheckInt($val){
        
        if(is_numeric($val)){
            return $val;
        }else{
            return false;
        }
    
    }
    
    
    
    function PostVar($name){
    
        $input_text = '';
        
        if(isset($_POST[$name])){
            $input_text = $this->strip_data($_POST[$name]);
            $input_text = htmlspecialchars($input_text);
            //$input_text = mysql_escape_string($input_text);
        }
        return $input_text;
    }
    
    
    function GetVar($name){
        
        $input_text = '';
        
        if(isset($_GET[$name])){
            $input_text = $this->strip_data($_GET[$name]);
            $input_text = htmlspecialchars($input_text);
            //$input_text = mysql_escape_string($input_text);
        }
        return $input_text;
    }
    
    
    function strip_data($text)
    {
        $quotes = array ("\x27", "\x22", "\x60", "\t", "\n", "\r", "*", "%", "<", ">", "?", "!" );
        $goodquotes = array ("-", "+", "#" );
        $repquotes = array ("\-", "\+", "\#" );
        $text = trim( strip_tags( $text ) );
        $text = str_replace( $quotes, '', $text );
        $text = str_replace( $goodquotes, $repquotes, $text );
                
        return $text;
    }
        
    
    
    
}





?>