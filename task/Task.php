<?php 


class Task 
{
  
    
    public $status = 'Подано новое объявление';
    public $customer_id; // id заказчика
    public $executor_id; // id исполнителя

    public const STATUS_NEW = 'new';
    public const STATUS_CANCEL  = 'cancel';
    public const STASTUS_WORK = 'in_work';
    public const STATUS_DONE = 'done';
    public const STATUS_REFUSE = 'refuse';

    public const ACTION_CANCEL = 'action_canel';
    public const ACTION_ANSWER = 'action_answer';
    public const ACTION_DONE = 'action_done';
    public const ACTION_REFUSE = 'action_refuse';


   
    
    

    public function __construct($customer_id, $executor_id = 0)
    {

            $this->customer_id = $customer_id;

            $this->executor_id = $executor_id;

    }

     /**
     * Карта статусов
     */
    public function statusMap()
    {
        return [
            self::STATUS_NEW => 'Подано новое объявление',
            self::STATUS_CANCEL => 'Отменено',
            self::STASTUS_WORK => 'В работе',
            self::STATUS_DONE => 'Выполнено',
            self::STATUS_REFUSE => 'Провалено'
        ];
    }

   /**
    * Карта действий
    */
    public function actionsMap()
    {
        return  [

            'new' => [
                'status' => 'Подано новое объявление',
                'actions' => [
                    self::ACTION_CANCEL =>'Отменить',
                    self::ACTION_ANSWER => 'Откликнуться']
            ],
            'in_work' => [
                'status' => 'В работе',
                'actions' => [
                    self::ACTION_DONE => 'Выполнено',
                    self::ACTION_REFUSE => 'Отказаться'
                ]
            ]
            
        ];
    }

   


   

    /**
     * Получение возможных действий
     */
    public function getActions()
    {
        $actions = [];
        
        foreach($this->actionsMap() as $key => $item){

            if($this->status == $item['status']){

                $actions = $item['actions'];
                
            }
        }

        return $actions;
    }



    /**
     * Получение текущего статуса
     */
    public function getStatus($action = 0)
    {   
        
        $map = $this->statusMap();

       if(array_key_exists($action, $map)){

        $this->status = $map[$action];

       }

       return $this->status;
    }
}