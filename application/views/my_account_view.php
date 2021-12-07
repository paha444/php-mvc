<?php if (!defined('SITE')) exit('No direct script access allowed.'); ?>
<?php include('inc/head.php'); ?>
<body>
<?php include('inc/header.php'); ?>


<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Личный кабинет</h2>
        <p class="lead"></p>
      </div>

      <div class="row">

        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Ваши данные</h4>
          
            <?php //print_r($this->User); ?>

              <form action="/action/update_user" id="user_info" name="user_info" method="post" enctype="multipart/form-data"> 
            
                  <div>
                    <input class="form-control" type="text" name="login" id="login" value="<?php echo $this->User->params['login']; ?>" 
                    placeholder="login*" disabled="disabled" />
                    <?php //echo $this->CheckRegData['login']; ?>
                  </div> 
            
                  <div>
                    <label class="lock" for="password"></label>
                    <input class="form-control" type="password" name="password" id="password" value="" placeholder="пароль" />
                  </div>
                  
                  <div>
                    <input class="form-control" type="password" name="password2" id="password2" value="" placeholder="повторите пароль" />
                    <?php //echo $this->CheckUpdateData['password2']; ?>
                  </div>
                  
            
                  <div>
                    <input class="form-control" type="text" name="email" id="email" value="<?php echo $this->User->params['email']; ?>" placeholder="email*" required />
                    <?php //echo $this->CheckUpdateData['email']; ?>
                  </div> 
            
                  <div>
                    <input class="form-control" type="text" name="name" id="name" value="<?php echo $this->User->params['name']; ?>" placeholder="name" />
                  </div> 
            
            
                  <div>
                    <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $this->User->params['phone']; ?>" placeholder="Phone" />
                  </div> 
            
                  <div>
                    <textarea class="form-control" name="dop_info" id="dop_info" placeholder="dop_info_pl_txa"><?php echo $this->User->params['dop_info']; ?></textarea>
                  </div> 
            
                  <div>
                  <fieldset>
                    <label>Изображение</label>
                    <input class="form-control" type="file" name="image"/>
                  </fieldset>  
                  </div> 
                   
                 <div>
                  <input type="hidden" name="action" value="update_user"/>  
                  <input class="w-100 btn btn-lg btn-success mt-3" name="submit" type="submit" value="Сохранить" />
                 </div>
            
                  <div class="clear"></div>
              </form>          
          
          
        </div>
        
        <div class="col-md-4 order-md-2 mb-4">

            <?php if( $this->User->params['image']){ ?>
            <div class="user_image">
                <img src="/images/avatars/<?php echo $this->User->params['image']; ?>"/>
            </div>
            <?php } ?>

            <form action="/logout/" method="GET" class="mb-3">
                 <input name="hash" type="hidden" value="<?php echo $_SESSION['hash'] ?>"><br>
                <input class="w-100 btn btn-lg btn-primary" name="submit" type="submit" value="Выйти">
            </form>  
          

            
           

        </div>        
        
      </div>


    </div>






<?php include('inc/footer.php'); ?>