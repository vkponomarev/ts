<?php

namespace common\componentsV2\elements;

use Yii;
use yii\console\widgets\Table;
use yii\web\NotFoundHttpException;


class ElementsTexts
{

    public $namesCapital;


    function __construct()
    {
        $this->namesCapital = $this->namesCapital();

    }

    private function namesCapital(){

        $namesCapital[1] = Yii::t('app', 'Water');
        $namesCapital[2] = Yii::t('app', 'Earth');
        $namesCapital[3] = Yii::t('app', 'Fire');
        $namesCapital[4] = Yii::t('app', 'Air');

        return $namesCapital;
    }

/*
    private function names(){

        $this->names[1] = Yii::t('app', 'aries');
        $this->names[2] = Yii::t('app', 'taurus');
        $this->names[3] = Yii::t('app', 'gemini');
        $this->names[4] = Yii::t('app', 'cancer');
        $this->names[5] = Yii::t('app', 'leo');
        $this->names[6] = Yii::t('app', 'virgo');
        $this->names[7] = Yii::t('app', 'libra');
        $this->names[8] = Yii::t('app', 'scorpio');
        $this->names[9] = Yii::t('app', 'sagittarius');
        $this->names[10] = Yii::t('app', 'capricorn');
        $this->names[11] = Yii::t('app', 'aquarius');
        $this->names[12] = Yii::t('app', 'pisces');


        return $this->names;
    }
*/
}

