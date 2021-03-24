<?php

namespace common\componentsV2\date;

use Yii;
use yii\web\NotFoundHttpException;


class DateQuarter
{


    //public $current;
    public $current;
    public $currentName;

    function __construct($date)
    {

        $this->quarter($date);
        return $this;
    }


    /**
     * @param $date \DateTime
     * @return $this
     */
    public function quarter($date)
    {

        $month = (int)$date->format('m');
        //(new \common\components\dump\Dump())->printR($month);die;
        if ($month >=1 && $month <=3){
            $this->current = 1;
            $this->currentName = $this->current . ' ' . Yii::t('app', 'quarter');
        }
        if ($month >=4 && $month <=6){
            $this->current = 2;
            $this->currentName = $this->current . ' ' . Yii::t('app', 'quarter');
        }
        if ($month >=7 && $month <=9){
            $this->current = 3;
            $this->currentName = $this->current . ' ' . Yii::t('app', 'quarter');
        }
        if ($month >=10 && $month <=12){
            $this->current = 4;
            $this->currentName = $this->current . ' ' . Yii::t('app', 'quarter');
        }




        return $this;
    }

}

