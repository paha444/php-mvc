<?php if (!defined('SITE')) exit('No direct script access allowed.'); ?>


<?php //print_r($this->User); ?>
<?php //echo $this->User->status_auth; ?>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Bejee</h4>
              <p class="text-muted"></p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Меню</h4>
              <ul class="list-unstyled">

                <li><a class="text-white" href="<?php echo $this->config['base_url'] ?>">Главная</a></li>
                <?php if(!$this->User->status_auth): ?>
                        <li><a class="text-white" href="/login">Авторизация</a></li>
                        <li><a class="text-white" href="/registration">Регистрация</a></li>
                <?php else: ?>
                        <li><a class="text-white" href="/my_account">Личный кабинет</a></li>
                        <li><a class="text-white" href="/action/logout/?hash=<?php echo $_SESSION['hash'] ?>">Выйти</a></li>
                <?php endif; ?>
        
                <li><a class="text-white" href="/task/create">Создать задачу</a></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="<?php echo $this->config['base_url'] ?>" class="navbar-brand d-flex align-items-center">
            <img src="//beejee.ru//upload/landings/files/files/beejee_header_new_white.webp" width="100"/>
          </a>
          <?php if($this->User->status_auth): ?>
          <div style="color: #d4edda; font-size: 16px;">Здравствуйте <?php echo $this->User->name ?>!</div>
          <?php endif; ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
 
 
    <?php //print_r($this->message); ?>
    
    <?php if($this->message){ ?>
    <div class="alert alert-<?php echo $this->message['type'] ?> alert-dismissible fade show" role="alert">
      <p><?php echo $this->message['message'] ?></p>
      <div><?php echo $this->message['m'] ?></div>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php } ?>