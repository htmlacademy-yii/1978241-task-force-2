<?php 


class Task 
{
    private $action = ''; // текущее действие
    

    public $currentStatus = 'Не определен';
    public $customer_id; // id заказчика
    public $executor_id; // id исполнителя

    public const STATUS_NEW = 'Подано новое объявление';
    public const STASTUS_WORK = 'В работе';
    public const STATUS_DONE = 'Выполнено';
    public const STATUS_REFUSE = 'Провалено';

    public const ACTION_CANCEL = 'Отменить';
    public const ACTION_ANSWER = 'Откликнуться';
    public const ACTION_DONE = 'Выполнено';
    public const ACTION_REFUSE = 'Отказаться';


    private $map = [
       'new' => [
           'status' => self::STATUS_NEW,
           'actions' => [
            'cancel' =>self::ACTION_CANCEL,
            'answer' => self::ACTION_ANSWER]
           ],
        'work' => [
            'status' => self::STASTUS_WORK,
            'actions' => [
                'done' => self::ACTION_DONE,
                'refuse' => self::ACTION_REFUSE
                    ]
            ],
        'done_action' => [
            'status' => self::STATUS_DONE
        ],
        'refuse_action' => [
            'status' => self::STATUS_REFUSE
        ]

    ];
    
    

    public function __construct($action, $customer_id, $executor_id = 0)
    {
            $this->action = $action;

            $this->customer_id = $customer_id;

            $this->executor_id = $executor_id;

            $this->getStatus();

    }

    /**
     * Получение возможных действий
     */
    public function getActions()
    {
        if(array_key_exists($this->action, $this->map)){

           return $actions = $this->map[$this->action]['actions'];
        }

        return false;
    }



    /**
     * Получение текущего статуса
     */
    public function getStatus()
    {   

       if(array_key_exists($this->action, $this->map)){

        $this->currentStatus = $this->map[$this->action]['status'];
       }

       return $this->currentStatus;
    }
}