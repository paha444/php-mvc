<?php if (!defined('SITE')) exit('No direct script access allowed.'); ?>
<?php include('application/views/inc/head.php'); ?>
<body>
<?php include('application/views/inc/header.php'); ?>

    <main role="main">


      <<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Создание задачи</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        <div class="col-md-12 mb-4">
            
            <?php //print_r($this->data); ?>

              <form action="/task/save" method="post" enctype="multipart/form-data"> 

            
                  <div class="row">
                      <div class="col-md-12 mb-4">
                        <input class="form-control" type="text" name="name"
                        value=""
                        placeholder="Имя пользователя" required/>
                      </div> 
                  </div> 
            
                  <div class="row">
                      <div class="col-md-12 mb-4">
                        <input class="form-control" type="text" name="email"
                        value=""
                        placeholder="Email" required />
                      </div> 
                  </div> 
            
                  <div class="row">
                      <div class="col-md-12 mb-4">
                        <textarea class="form-control" name="task"
                        placeholder="Текст задачи" required></textarea>
                      </div> 
                  </div> 
                   
                 <div>
                  <input class="w-100 btn btn-lg btn-success mt-3" name="submit" 
                  type="submit" value="Сохранить" />
                 </div>

              </form>          
          
          
        </div>
      </div>


    </div>

    </main>



<?php include('application/views/inc/footer.php'); ?>