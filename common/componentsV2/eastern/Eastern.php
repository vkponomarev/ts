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
     * @var \common\componentsV2\eastern\EasternAnimals
     */
    public $animals;

    /**
     * @var \common\componentsV2\eastern\EasternElements
     */
    public $elements;

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

    function animals(){
        $this->animals = new EasternAnimals();
        return $this;
    }

    function elements(){
        $this->elements = new EasternElements();
        return $this;
    }



}

