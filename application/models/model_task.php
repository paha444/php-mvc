<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Model_Task extends Model
{
    

function create_task($name,$email,$task){


    $sql = "INSERT `tasks` (`name`,`email`,`task`,`status`) VALUES ('$name','$email','$task',0);";
    
    if(mysqli_query($this->db,$sql)){
        //$this->setMessage('<span class="green">'.$this->get_text_m('text_2').'</span>');   
    }else{
        //$this->setMessage('<span>'.mysqli_error($this->db).'</span>'); 
    }
    
}



}




?>