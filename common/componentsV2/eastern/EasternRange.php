<?php

namespace common\componentsV2\eastern;

use Yii;
use yii\web\NotFoundHttpException;


class EasternRange
{

    /**
     * @var integer Year
     */
    public $start;

    /**
     * @var integer Year
     */
    public $end;


    function range(){
        $this->start = 1900;
        $this->end = 2079;
        return $this;
    }


}

