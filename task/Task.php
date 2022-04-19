<?php 


class Task 
{
  
    
    public $status = 'Не определен';
    public $customer_id; // id заказчика
    public $executor_id; // id исполнителя

    public const STATUS_NEW = 'new';
    public const STASTUS_WORK = 'in_work';
    public const STATUS_DONE = 'done';
    public const STATUS_REFUSE = 'refuse';

    public const ACTION_CANCEL = 'action_canel';
    public const ACTION_ANSWER = 'action_answer';
    public const ACTION_DONE = 'action_done';
    public const ACTION_REFUSE = 'action_refuse';


   
    
    

    public function __construct($action, $customer_id, $executor_id = 0)
    {

            $this->customer_id = $customer_id;

            $this->executor_id = $executor_id;

            $this->getStatus($action);

    }

  
   
    public function getMap()
    {
        return  [

            'new' => [
                self::STATUS_NEW => 'Подано новое объявление',
                'actions' => [
                    self::ACTION_CANCEL =>'Отменить',
                    self::ACTION_ANSWER => 'Откликнуться']
            ],
            'in_work' => [
                self::STASTUS_WORK => 'В работе',
                'actions' => [
                    self::ACTION_DONE => 'Выполнено',
                    self::ACTION_REFUSE => 'Отказаться'
                ]
            ],
            'done' => [
                self::STATUS_DONE => 'Выполнено',
                'actions' => []
            ],
            'refuse' => [
                self::STATUS_REFUSE => 'Провалено',
                'action' => []
            ]
            
        ];
    }

    /**
     * Получение возможных действий
     */
    public function getActions()
    {
        
        foreach($this->getMap() as $key => $item){

            if($this->status == $item[$key]){

                $actions = $item['actions'];
            }
        }

        return $actions;
    }



    /**
     * Получение текущего статуса
     */
    private function getStatus($action)
    {   
        $map = $this->getMap();

       if(array_key_exists($action, $map)){

        $this->status = $map[$action][$action];

       }

       return $this->status;
    }
}