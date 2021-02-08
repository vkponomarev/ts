<?php

namespace common\componentsV2\mascots;

use Yii;
use yii\console\widgets\Table;
use yii\web\NotFoundHttpException;


class MascotsTexts
{

    public $namesCapital;


    function __construct()
    {
        $this->namesCapital = $this->namesCapital();

    }

    private function namesCapital(){

        $namesCapital[1] = Yii::t('app', 'The Golden Fleece');
        $namesCapital[2] = Yii::t('app', 'The hammer');
        $namesCapital[3] = Yii::t('app', 'Owl');
        $namesCapital[4] = Yii::t('app', 'Golden calf');
        $namesCapital[5] = Yii::t('app', 'Mask');
        $namesCapital[6] = Yii::t('app', 'Snake');
        $namesCapital[7] = Yii::t('app', 'Clover');
        $namesCapital[8] = Yii::t('app', 'Emerald');
        $namesCapital[9] = Yii::t('app', 'Ladybug');
        $namesCapital[10] = Yii::t('app', 'Lion');
        $namesCapital[11] = Yii::t('app', 'Eagle');
        $namesCapital[12] = Yii::t('app', 'Aster');
        $namesCapital[13] = Yii::t('app', 'Grasshopper');
        $namesCapital[14] = Yii::t('app', 'Book');
        $namesCapital[15] = Yii::t('app', 'Heart');
        $namesCapital[16] = Yii::t('app', 'Opal');
        $namesCapital[17] = Yii::t('app', 'Scorpio');
        $namesCapital[18] = Yii::t('app', 'Bug');
        $namesCapital[19] = Yii::t('app', 'Horseshoe');
        $namesCapital[20] = Yii::t('app', 'Salamander');
        $namesCapital[21] = Yii::t('app', 'Black cat');
        $namesCapital[22] = Yii::t('app', 'Icon');
        $namesCapital[23] = Yii::t('app', 'Key');
        $namesCapital[24] = Yii::t('app', 'Narcissus');
        $namesCapital[25] = Yii::t('app', 'Knot');
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

