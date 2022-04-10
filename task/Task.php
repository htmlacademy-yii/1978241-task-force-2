<?php 


class Task 
{
    private $action; 
    private $actions; 

    public $customer; // id заказчика
    public $executor; // id исполнителя

    private $map = [
       'new' => [
           'status' => 'Подано новое объявление',
           'actions' => [
            'cancel' => 'Отменить',
            'answer' => 'Откликнуться']
           ],
        'work' => [
            'status' => 'В работе',
            'actions' => [
                'done' => 'Выполнено',
                'refuse' => 'Отказаться'
                    ]
            ],
        'done_action' => [
            'status' => 'Выполнено'
        ],
        'refuse_action' => [
            'status' => 'Провалено'
        ]

        ];
    
    

    public function __construct($action, $customer, $executor = 0)
    {
            $this->action = $action;

            $this->customer = $customer;

            $this->executor = $executor;

    }

    /**
     * Получение возможных действий
     */
    public function getActions()
    {
        foreach($this->map as $key => $item){

            if($this->action == $key){

               $this->actions = $item['actions']; 

            }
        }

        return $this->actions;
    }



    /**
     * Получение текущего статуса
     */
    public function getStatus()
    {   
        $status = 'Не определен';

       foreach($this->map as $key => $item){

        if($this->action == $key){

            $status = $item['status'];
        } 

       }

       return $status;
    }
}