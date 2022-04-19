
        
    <?php require 'Task.php';

    $action = 'new';

    $task = new Task($action, 1, 2);

    $actions = $task->getActions();

    echo "Статус, в котором находиться задание: {$task->status}<br><br>";

    echo 'Возможные действия в текущем статусе: ';

    foreach($actions as $key => $name){

        echo $name . ' ';
    }

   
   
