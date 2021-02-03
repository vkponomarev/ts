<?php

namespace common\componentsV2\eastern;

use Yii;
use yii\web\NotFoundHttpException;


class Eastern
{

    /**
     * @var \common\componentsV2\eastern\EasternRange
     */
    public $range;

    /**
     * @var \common\componentsV2\eastern\EasternCalendar
     */
    public $calendar;

    /**
     * Описание
     * @var \common\componentsV2\eastern\EasternText
     */
    public $text;

    /**
     * @return $this
     */
    function range(){
        $this->range = (new EasternRange())->range();
        return $this;
    }

    function calendar($year = 0){
        $this->calendar = (new EasternCalendar())->calendar($year);
        return $this;
    }

    function text(){
        $this->text = new EasternText();
        return $this;
    }



}

