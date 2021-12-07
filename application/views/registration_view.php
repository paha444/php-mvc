<?php if (!defined('SITE')) exit('No direct script access allowed.'); ?>
<?php include('inc/head.php'); ?>
<body>
<?php include('inc/header.php'); ?>

<?php //echo $this->language_ru['register'] ?>

<main class="form-signin">
  <form action="/action/registration" id="registration_form" class="<?php //echo $this->active_reg; ?>" name="registration" method="post" enctype="multipart/form-data"> 

    <img class="mb-4" src="//getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Регистрация</h1>
      <div>

                <input class="form-control" type="text" name="login" id="login" 
                value="<?php //echo $this->FormRegData['login']; ?>" 
                placeholder="<?php echo $this->language_ru['login']; ?>*" required />
                
                  <?php //echo $this->CheckRegData['login']; ?>
                
    
        
      </div> 

      <div>
        <input class="form-control" type="password" name="password" id="password" value="<?php //echo $this->FormRegData['password2']; ?>" placeholder="<?php echo $this->language_ru['password']; ?>*" required />
      </div>
      
      <div>
        <input class="form-control" type="password" name="password2" id="password2" value="<?php //echo $this->FormRegData['password2']; ?>" placeholder="<?php echo $this->language_ru['password2']; ?>*" required />
        <?php //echo $this->CheckRegData['password2']; ?>
      </div>
      

      <div>
        <input class="form-control" type="text" name="email" id="email" value="<?php //echo $this->FormRegData['email']; ?>" placeholder="<?php echo $this->language_ru['Email']; ?>*" required />
        <?php //echo $this->CheckRegData['email']; ?>
      </div> 

      <div>
        <input class="form-control" type="text" name="name" id="name" placeholder="<?php echo $this->language_ru['Name']; ?>" />
      </div> 

      <div>
        <input class="form-control" type="text" name="phone" id="phone" placeholder="<?php echo $this->language_ru['Phone']; ?>" />
      </div> 

      <div>
        <textarea class="form-control" name="dop_info" id="dop_info" placeholder="<?php echo $this->language_ru['dop_info_pl_txa']; ?>"></textarea>
      </div> 

      <div>
          <fieldset>
            <label><?php echo $this->language_ru['your_image']; ?>*</label>
            <input type="file" name="image"/>
          </fieldset>  
      </div> 
      

      
     <div>
      <input type="hidden" name="action" value="registration"/>  
      <input class="w-100 btn btn-lg btn-primary" name="submit" type="submit" value="<?php echo $this->language_ru['reg_bt']; ?>" />
     </div>

      <div class="clear"></div>
  </form>
</main>


<?php include('inc/footer.php'); ?>