<?php if (!defined('SITE')) exit('No direct script access allowed.'); ?>
<?php include('inc/head.php'); ?>
<body>
<?php include('inc/header.php'); ?>

    <main role="main">


      <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-2">  
                
                <span>Сортировать по:</span>
            
                </div>
                <div class="col-md-10">  
                
                    <form action="/tasks/" method="GET" class="mb-3">

                        <input type="hidden" name="page" value="<?php echo $this->data['pagination']['active'] ?>"/>

                        <select id="sort_by" name="sort_by">
                            <option value=""></option>
                            <option value="name">имени пользователя</option>
                            <option value="email">email</option>
                            <option value="status">статусу</option>
                        </select>

                        <select id="order_by" name="order_by">
                            <option value=""></option>
                            <option value="ASC">по возрастанию</option>
                            <option value="DESC">по убыванию</option>
                        </select>
                        
                        
                        <input class="btn btn-secondary" type="submit" value="применить" />
                        

                    </form>     
                    
                <script type="text/javascript">
                    document.getElementById('sort_by').value='<?php echo $this->data['pagination']['sort_by'] ?>';
                    document.getElementById('order_by').value='<?php echo $this->data['pagination']['order_by'] ?>';
                </script>                    
                                    
            
                </div>
            </div>

          <div class="row">
            
<?php foreach($this->data['tasks'] as $task){ ?>
            
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">

                <div class="card-body">
                  <p><?php echo $task->name ?></p>
                  <p><?php echo $task->email ?></p>
                  <p class="card-text"><?php echo $task->task ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                        <?php if($task->status){ ?>
                        <div class="alert alert-success" role="alert">
                            Проверено
                        </div>
                        <?php }else{ ?>
                        <div class="alert alert-warning" role="alert">
                            Не проверено  
                        </div>
                        <?php } ?>
                  </div>
                   
                  <?php if($this->User->role=='admin'){ ?>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/admin/task/edit/?id=<?php echo $task->id ?>"><button type="button" class="btn btn-sm btn-outline-primary">Edit</button></a>
                      <a href="/admin/task/delete/?id=<?php echo $task->id ?>" onclick="return confirm('Вы действительно хотите удалить задачу?');"><button type="button" class="btn btn-sm btn-outline-danger">Delete</button></a>
                    </div>
                  </div>      
                  <?php } ?>             
                  
                </div>
              </div>
            </div>
            
<?php } ?>            


            
            
          </div>
           
        <div class="row">
            <div class="col-md-12 text-center">      
                
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    
                    <li class="page-item"><a class="page-link" href="<?php echo $this->data['pagination']['prev'] ?>">Previous</a></li>
                    
                    <?php for ($i = 1; $i <= $this->data['pagination']['total']; $i++) {  ?>
                        <li class="page-item"><a class="page-link" href="<?php  printf($this->data['pagination']['page'],$i); ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    
                    <li class="page-item"><a class="page-link" href="<?php echo $this->data['pagination']['next'] ?>">Next</a></li>
                  </ul>
                </nav>          
            </div>
        </div>           
  
          
          
        </div>
      </div>

    </main>



<?php include('inc/footer.php'); ?>