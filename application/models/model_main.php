<?php if (!defined('SITE')) exit('No direct script access allowed.');

class Model_Main extends Model
{
    
    
    
    
	public function get_data($page,$sort_by ,$order_by)
	{	
        
        //echo $sort_by, $order_by; die;
        

        $tasks = [];
        $pagination = [];
        
        $result = mysqli_query($this->db,"SELECT COUNT(*) FROM tasks");
        $posts = mysqli_fetch_row($result);
        
        //print_r($posts);
        
        // Находим общее число страниц
        $total = intval(($posts[0] - 1) / $this->config['on_page']) + 1; 
        
        $pagination['total'] = $total;
        $pagination['active'] = $page;
        
        if($page>1){
            $pagination['prev'] = '/tasks/?page='.($page-1).'&sort_by='.$sort_by.'&order_by='.$order_by;
        }else{
            $pagination['prev'] = '/tasks/?page='.$page.'&sort_by='.$sort_by.'&order_by='.$order_by;
        }
        
        if($page<$total){
            $pagination['next'] = '/tasks/?page='.($page+1).'&sort_by='.$sort_by.'&order_by='.$order_by;
        }else{
            $pagination['next'] = '/tasks/?page='.$page.'&sort_by='.$sort_by.'&order_by='.$order_by;
        }

        $pagination['page'] = '/tasks/?page=%d&sort_by='.$sort_by.'&order_by='.$order_by;
        
        $pagination['sort_by'] = $sort_by;
        $pagination['order_by'] = $order_by;
        
        $start = $page * $this->config['on_page'] - $this->config['on_page']; 
        
        $sql  = "";
        $sql .= "SELECT * FROM `tasks`";
        
        if($sort_by) $sql .= "ORDER BY $sort_by $order_by ";
        
        $sql .= "LIMIT $start, ".$this->config['on_page']." ";
        
        //echo $sql;
        
        $result = mysqli_query($this->db,$sql);
        
        while ($row = mysqli_fetch_object($result)) { 
            $tasks[] = $row; 
        }      
        
        return ['tasks' => $tasks, 'pagination' => $pagination];
       
        
	}
}




?>