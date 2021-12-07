<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Model_Task extends Model
{
    
use Functions;


function delete_task($id){

    $sql = "DELETE FROM `tasks` WHERE `id` = '".$id."'";
    
    if(mysqli_query($this->db,$sql)){
        
        $this->setMessage(['type'=>'success','message' =>'Задача удалена.']);
        
        
        //$this->setMessage('<span class="green">'.$this->get_text_m('text_15').'</span>');   
    }else{
        //$this->setMessage('<span>'.mysqli_error($this->db).'</span>'); 
        
        $this->setMessage(['type'=>'danger','message' => mysqli_error($this->db)]);
    }

}

function edit_task($id){

    $sql = "SELECT * FROM `tasks` WHERE `id` = '$id'";
    //echo $sql;
    $result = mysqli_query($this->db,$sql);
    $task = mysqli_fetch_object($result);
    
    //if(!$this->task->id) 
     //   $this->Redirect('/');
     
     
     
        
        return $task;
        
        //return ['task' => $tasks, 'pagination' => $pagination];

}


function update_task($id,$name,$email,$task,$status){





    $sql = "UPDATE `tasks` SET 
    `name`='$name',
    `email`='$email',
    `task`='$task',
    `status`='$status'
     WHERE `id`='$id';";
    
    if(mysqli_query($this->db,$sql)){
        //$this->setMessage('<span class="green">'.$this->get_text_m('text_2').'</span>');
        
        $this->setMessage(['type'=>'success','message' =>'Задача обновлена.']);
           
    }else{
        //$this->setMessage('<span>'.mysqli_error($this->db).'</span>'); 
        
        $this->setMessage(['type'=>'danger','message' => mysqli_error($this->db)]);
    }
    
    
    
            
    

}



}




?>