<?php if (!defined('SITE')) exit('No direct script access allowed.'); ?>
<?php include('inc/head.php'); ?>
<body>
<?php include('inc/header.php'); ?>

<main class="form-signin">
  <form action="/action/login" method="post" enctype="multipart/form-data">
    <img class="mb-4" src="//getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Авторизация</h1>
    <label for="inputEmail" class="visually-hidden">Email address</label>
    
        <input name="login" type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    
        <label for="inputPassword" class="visually-hidden">Password</label>
    
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <input type="hidden" name="action" value="login"/> 
    <input class="w-100 btn btn-lg btn-primary" name="submit" type="submit" value="Войти" />
    
    <p class="mt-5 mb-3 text-muted">2017–2021</p>
  </form>
</main>


<?php include('inc/footer.php'); ?>