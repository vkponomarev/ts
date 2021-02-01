<?php

namespace common\componentsV2\date;

use Yii;
use yii\web\NotFoundHttpException;


class Date
{

    /**
     * @var \DateTime
     */
    public $date;

    public $current;
    public $next;
    public $afterNext;
    public $previous;
    public $afterPrevious;


    /**
     * @var \common\componentsV2\date\DateYear
     */
    public $year;

    /**
     * @var \common\componentsV2\date\DateMonth
     */
    public $month;

    /**
     * Date constructor.
     * @param $date string format 'Y-m-d'
     * @throws \Exception
     */
    function __construct($date)
    {
        $this->date = new \DateTime($date);

    }

    /**
     * @throws \Exception
     */
    function date(){

        $dateMain = new \DateTime($this->date->format('Y-m-d'));
        $this->current = $dateMain->format('Y-m-d');
        $this->next = $dateMain->modify('+1 day')->format('Y-m-d');
        $this->afterNext = $dateMain->modify('+1 day')->format('Y-m-d');
        $this->previous = $dateMain->modify('-3 day')->format('Y-m-d');
        $this->afterPrevious = $dateMain->modify('-1 day')->format('Y-m-d');

        return $this;
    }

    /**
     * @throws \Exception
     */
    function year(){

        $this->year = (new DateYear())->year($this->date);
        return $this;

    }

    /**
     * @throws \Exception
     */
    function month(){

        $this->month = (new DateMonth())->month($this->date, $this->year);
        return $this;

    }



}

