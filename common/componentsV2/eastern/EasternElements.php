<?php

namespace common\componentsV2\eastern;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * 1- белый
 * 2- черный
 * 3- сине-зеленый
 * 4- красный
 * 5- желтый
 */
class EasternElements
{

    /**
     * @var array Массив названий цветов года
     */
    public $colors;

    /**
     * @var array массив названий элементов года
     */
    public $elements;


    function __construct()
    {
        $this->elements = $this->elements();
        $this->colors = $this->colors();
    }

    function colors(){

        $this->colors[1] = Yii::t('app', 'white');
        $this->colors[2] = Yii::t('app', 'black');
        $this->colors[3] = Yii::t('app', 'blue-green');
        $this->colors[4] = Yii::t('app', 'red');
        $this->colors[5] = Yii::t('app', 'yellow');

        return $this->colors;
    }


    function elements(){

        $this->elements[1] = Yii::t('app', 'metal');
        $this->elements[2] = Yii::t('app', 'water');
        $this->elements[3] = Yii::t('app', 'wood');
        $this->elements[4] = Yii::t('app', 'fire');
        $this->elements[5] = Yii::t('app', 'earth');

        return $this->elements;
    }


}

