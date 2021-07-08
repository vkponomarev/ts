<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckCalcNames
{

    /**
     * UrlCheckCalcNames constructor.
     * @param $calcNameOne
     * @param $calcNameTwo
     * @throws \yii\web\NotFoundHttpException
     */
    function __construct($calcNameOne, $calcNameTwo)
    {

        $this->calcNameOne = (new UrlCheckCalcName($calcNameOne));
        $this->calcNameTwo = (new UrlCheckCalcName($calcNameTwo));

        if ($this->calcNameOne == $this->calcNameTwo){
            throw new NotFoundHttpException('404');
        }
    }


}
