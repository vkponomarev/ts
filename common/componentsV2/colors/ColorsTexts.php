<?php

namespace common\componentsV2\colors;

use Yii;
use yii\console\widgets\Table;
use yii\web\NotFoundHttpException;


class ColorsTexts
{

    public $namesCapital;


    function __construct()
    {
        $this->namesCapital = $this->namesCapital();

    }

    private function namesCapital(){

        $namesCapital[1] = Yii::t('app', 'Maroon');
        $namesCapital[2] = Yii::t('app', 'Purple');
        $namesCapital[3] = Yii::t('app', 'Crimson');
        $namesCapital[4] = Yii::t('app', 'Red');
        $namesCapital[5] = Yii::t('app', 'Orange');
        $namesCapital[6] = Yii::t('app', 'Yellow');
        $namesCapital[7] = Yii::t('app', 'Blue');
        $namesCapital[8] = Yii::t('app', 'Green');
        $namesCapital[9] = Yii::t('app', 'Pink');
        $namesCapital[10] = Yii::t('app', 'Golden');
        $namesCapital[11] = Yii::t('app', 'Golden beige');
        $namesCapital[12] = Yii::t('app', 'Blue');
        $namesCapital[13] = Yii::t('app', 'Pastel colors');
        $namesCapital[14] = Yii::t('app', 'Bright blue');
        $namesCapital[15] = Yii::t('app', 'Shades of burgundy and red');
        $namesCapital[16] = Yii::t('app', 'Gray');
        $namesCapital[17] = Yii::t('app', 'Black');
        $namesCapital[18] = Yii::t('app', 'Dark green');
        $namesCapital[19] = Yii::t('app', 'Brown');
        $namesCapital[20] = Yii::t('app', 'Silver');
        $namesCapital[21] = Yii::t('app', 'White');
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

