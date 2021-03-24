<?php

namespace common\componentsV2\date;

use Yii;
use yii\web\NotFoundHttpException;


class DateSeason
{


    //public $current;
    public $currentURL;
    public $currentName;

    function __construct($date)
    {

        $this->season($date);
        return $this;
    }


    /**
     * @param $date \DateTime
     * @return $this
     */
    public function season($date)
    {

        $month = (int)$date->format('m');
        //(new \common\components\dump\Dump())->printR($month);die;
        if ($month >=3 && $month <=5){
            $this->currentURL = 'spring';
            $this->currentName = Yii::t('app', 'Spring');
        }
        if ($month >=6 && $month <=8){
            $this->currentURL = 'summer';
            $this->currentName = Yii::t('app', 'Summer');
        }
        if ($month >=9 && $month <=11){
            $this->currentURL = 'autumn';
            $this->currentName = Yii::t('app', 'Autumn');
        }
        if ($month == 12 or $month == 1 or $month == 2){
            $this->currentURL = 'winter';
            $this->currentName = Yii::t('app', 'Winter');
        }




        return $this;
    }

}

