<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckCalcName
{


    function __construct($calcName)
    {

        $this->calculators = [
            1 => 'seconds',
            2 => 'minutes',
            3 => 'hours',
            4 => 'days',
            5 => 'weeks',
            6 => 'months',
            7 => 'years',
        ];

        $search = array_search($calcName, $this->calculators);

        if (!$search){
            throw new NotFoundHttpException('404');
        }

        $this->calculator = $search;

    }


}
