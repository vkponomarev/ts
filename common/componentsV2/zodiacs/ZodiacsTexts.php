<?php

namespace common\componentsV2\zodiacs;

use Yii;
use yii\console\widgets\Table;
use yii\web\NotFoundHttpException;


class ZodiacsTexts
{

    public $namesCapital;
    public $names;

    function __construct()
    {
        $this->namesCapital = $this->namesCapital();
        $this->names = $this->names();
    }

    private function namesCapital(){

        $this->namesCapital[1] = Yii::t('app', 'Aries');
        $this->namesCapital[2] = Yii::t('app', 'Taurus');
        $this->namesCapital[3] = Yii::t('app', 'Gemini');
        $this->namesCapital[4] = Yii::t('app', 'Cancer');
        $this->namesCapital[5] = Yii::t('app', 'Leo');
        $this->namesCapital[6] = Yii::t('app', 'Virgo');
        $this->namesCapital[7] = Yii::t('app', 'Libra');
        $this->namesCapital[8] = Yii::t('app', 'Scorpio');
        $this->namesCapital[9] = Yii::t('app', 'Sagittarius');
        $this->namesCapital[10] = Yii::t('app', 'Capricorn');
        $this->namesCapital[11] = Yii::t('app', 'Aquarius');
        $this->namesCapital[12] = Yii::t('app', 'Pisces');


        return $this->namesCapital;
    }


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

}

