
        
    <?php 

  
    
   
    require 'Task.php';

  

    $task = new Task(1, 2);

    

    echo "Статус, в котором находиться задание: {$task->getStatus()}<br><br>";

    echo 'Возможные действия в текущем статутсе :'; print_r($task->getActions());

 


   

    


        

   


  
