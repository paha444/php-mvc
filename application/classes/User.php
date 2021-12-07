<?php if (!defined('SITE')) exit('No direct script access allowed.');

/*
    В этом классе функции, авторизации, регистрации, редактирования пользователя.


*/

class User
{ 
    
    
    use Functions;


public $config;    
public $db;


public $status_auth;
public $role;
public $params;





function __construct() {
    
    $this->config = Config::get();
    $db = new Model();
    $this->db = $db->getDB(); // подключаем БД
    
}  


function CheckRegData(){
    
    
    $message = array();


    $query = mysqli_query($this->db,"SELECT * FROM `users` WHERE login='".mysqli_real_escape_string($this->db,$_POST['login'])."' LIMIT 1");
    $result = mysqli_fetch_assoc($query);
    
    if($result){
        $message['login'] = "<p>".$this->get_text_m('text_11')."</p>";
    }
    
    if($_POST['password']!=$_POST['password2']){
        $message['password2'] = "<p>".$this->get_text_m('text_8')."</p>";
    }
    
     
    $email = $_POST['email'];
    
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $query = mysqli_query($this->db,"SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($this->db,$_POST['email'])."' LIMIT 1");
        $result2 = mysqli_fetch_assoc($query);

        if($result2){
            $message['email'] = "<p>".$this->get_text_m('text_9')."</p>";
        }
        
    
    
    }else{
        $message['email'] = "<p>".$this->get_text_m('text_10')."</p>";
    }
    

    if(empty($message)){
        return true;
    }else{
        return $message;
    }
    
    
}




function Register(){

     $this->FormRegData = $_POST;
     
     $result = $this->CheckRegData();
     
     //print_r($result);
     
     if(!is_array($result)){

            $login = mysqli_real_escape_string($this->db,$_POST['login']);
            
            $password = md5($_POST['password'].$this->config['solt']);
            
            $password_db = mysqli_real_escape_string($this->db,$password);
            
            $email = mysqli_real_escape_string($this->db,$_POST['email']);
            $name = mysqli_real_escape_string($this->db,$_POST['name']);
            $phone = mysqli_real_escape_string($this->db,$_POST['phone']);
            $dop_info = mysqli_real_escape_string($this->db,$_POST['dop_info']);
            
            
            if($_FILES['image']){
            
            $image_name = '';
                
            $path = 'images/avatars/';
            
            $image_info = pathinfo($_FILES['image']['name']);
            
                if(isset($image_info['extension'])){
                    $new_filename = md5(microtime() . rand(0, 9999)).'.'.$image_info['extension'];
                    if (@copy($_FILES['image']['tmp_name'], $path . $new_filename)){
                        $image_name = $new_filename;
                    }
                }
            
            }
        
        
            $sql = "INSERT INTO `users` (`role`,`login`,`password`,`email`,`name`,`phone`,`dop_info`,`image`) 
                    VALUES ('user','$login','$password_db','$email','$name','$phone','$dop_info','$image_name')";
            
            //echo $sql;
            
            //die;
                    
            if(mysqli_query($this->db,$sql)){
                
                $this->setMessage(['type'=>'success','message' =>'Вы успешно зарегистрированы, теперь Вы можете войти на сайт.']);   
                
            }
            
            //die;
            
            //$this->setMessage(['type'=>'success', 'message' =>'вы зарегистрированы');
            
            //$this->Redirect('/login');               
        
        
     }else{
        
            $this->setMessage(['type'=>'danger','message' =>'Ошибка регистрации','m'=>$result]);
            
            //$this->CheckRegData = $result;
        
            $this->Redirect('/'); 
        
        
     }
     
     
     

}

  
   
    
function Auth(){
        
    
        $query = mysqli_query($this->db,"SELECT * FROM `users` WHERE login='".mysqli_real_escape_string($this->db,$_POST['login'])."' LIMIT 1");
    
        $data = mysqli_fetch_assoc($query);
        
        //print_r($data);
        
        $this->user = $data;
    
        if($data['password'] === md5($_POST['password'].$this->config['solt']))
        {
    
            $hash = md5($this->generateCode(10));
    
            mysqli_query($this->db,"UPDATE `users` SET hash='".$hash."' WHERE id='".$data['id']."'");
    
            
            $_SESSION['id']=$data['id'];
            $_SESSION['hash']=$hash;

            //echo 'ok';
            
            
            $this->Redirect('/');
            
       
        }else{
    
            //echo 'error';
            //$this->setMessage('<span class="red">'.$this->get_text_m('text_7').'</span>');
            
            $this->setMessage(['type'=>'warning','message' =>'Вы ввели неправильный логин/пароль']);
            
            $this->Redirect('login');
        }
        
        
        //$this->Redirect('my_account'); 
        
        
         
    
    }    
    
    
    


function CheckUpdateData(){
    
    //print_r($_POST);
    
    $message = array();

    
    if($_POST['password']!=$_POST['password2']){
        $message['password2'] = "<p>".$this->get_text_m('text_8')."</p>";
    }
     
    $email = $_POST['email'];
    
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $query = mysqli_query($this->db,"SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($this->db,$_POST['email'])."' AND id!='".$_SESSION['id']."' LIMIT 1");
        $result2 = mysqli_fetch_assoc($query);

        if($result2){
            $message['email'] = "<p>".$this->get_text_m('text_9')."</p>";
        }

    }else{
        $message['email'] = "<p>".$this->get_text_m('text_10')."</p>";
    }
    

    if(empty($message)){
        return true;
    }else{
        return $message;
    }
    
    
}



function Update_user(){
    
     $this->FormUpdateData = $_POST;
     
     $result = $this->CheckUpdateData();
     
     
     if(!is_array($result)){
            
            
            $set_password='';
            $set_image='';
           
            if(!empty($_POST['password']) and !empty($_POST['password2'])){            
                $password = md5($_POST['password'].$this->config['solt']);
                $password_db = mysqli_real_escape_string($this->db,$password);
                
                $set_password = "`password`='$password_db',";
            }
            
            $email = mysqli_real_escape_string($this->db,$_POST['email']);
            
            $name = mysqli_real_escape_string($this->db,$_POST['name']);
            $phone = mysqli_real_escape_string($this->db,$_POST['phone']);
            $dop_info = mysqli_real_escape_string($this->db,$_POST['dop_info']);
            
            
            
            if($_FILES['image']){
            
                $path = 'images/avatars/';
                
                $image_info = pathinfo($_FILES['image']['name']);
                
                if(isset($image_info['extension'])){
                    $new_filename = md5(microtime() . rand(0, 9999)).'.'.$image_info['extension'];
                     if (@copy($_FILES['image']['tmp_name'], $path . $new_filename)){
                        $set_image = ",`image`='$new_filename'";
                     }
                 }
            
            
            }
        
        
            $sql = "UPDATE `users` SET $set_password `email`='$email',`name`='$name',`phone`='$phone',`dop_info`='$dop_info' $set_image WHERE id='".$_SESSION['id']."'";
                    
            if(mysqli_query($this->db,$sql)){
                
                
                //$this->setMessage('<span class="green">'.$this->get_text_m('text_2').'</span>');   

            }


     }else{
        //$this->setMessage('<span class="red">'.$this->get_text_m('text_3').'</span>');
        
        $this->CheckUpdateData = $result;
        
     }
     
     $this->Redirect('/my_account');
     

    
}




function CheckAuth(){

    //$this->status_auth = 0;
    
    //echo 1;

    if (isset($_SESSION['id']) and isset($_SESSION['hash'])){   
        
        $query = mysqli_query($this->db,"SELECT * FROM `users` WHERE id = '".intval($_SESSION['id'])."' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query);
    
        if(($userdata['hash'] !== $_SESSION['hash']) or 
        ($userdata['id'] !== $_SESSION['id'])){
            //echo 1;
           
            $this->setMessage(['type'=>'warning','message' =>'Ошибка токена']);
       
           
           
           // $this->setMessage("<span class='red'>".$this->get_text_m('text_4')."</span>");
    
        }else{
            //echo 2;
            $this->status_auth = 1;
            $this->role = $userdata['role'];
            $this->name =$userdata['name'];
            $this->params =$userdata;
            
        }
   
    }
    
    //echo self::status_auth;


}



function U_Exit() { 	


    if(isset($_GET['hash']))
    
    {    
    
        if( isset($_SESSION['hash']) && $_GET['hash'] == $_SESSION['hash'])
        
        {
            unset($this->status_auth);
            unset($this->role);
            unset($this->params);
            
            $id = $_SESSION['id'];			 	
            
            mysqli_query($this->db,"UPDATE `users` SET hash='' WHERE id='".$id."'");
            
            unset($_SESSION['id']); //удаляем переменную сессии 
            unset($_SESSION['hash']); //удаляем переменную сессии 
            

            $this->Redirect('/');        
        
        }
    
    
    }

}


  
}



?>