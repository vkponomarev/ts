<?php

namespace common\componentsV2\planets;

use Yii;
use yii\console\widgets\Table;
use yii\web\NotFoundHttpException;


class PlanetsTexts
{

    public $namesCapital;
    //public $names;

    function __construct()
    {
        $this->namesCapital = $this->namesCapital();
        //$this->names = $this->names();
    }

    private function namesCapital(){

        $namesCapital[1] = Yii::t('app', 'Sun');
        $namesCapital[2] = Yii::t('app', 'Mercury');
        $namesCapital[3] = Yii::t('app', 'Venus');
        $namesCapital[4] = Yii::t('app', 'Earth');
        $namesCapital[5] = Yii::t('app', 'Mars');
        $namesCapital[6] = Yii::t('app', 'Jupiter');
        $namesCapital[7] = Yii::t('app', 'Saturn');
        $namesCapital[8] = Yii::t('app', 'Uranus');
        $namesCapital[9] = Yii::t('app', 'Neptune');
        $namesCapital[10] = Yii::t('app', 'Pluto');
        $namesCapital[11] = Yii::t('app', 'Moon');

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

