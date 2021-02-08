<?php

namespace common\componentsV2\stones;

use Yii;
use yii\console\widgets\Table;
use yii\web\NotFoundHttpException;


class StonesTexts
{

    public $namesCapital;


    function __construct()
    {
        $this->namesCapital = $this->namesCapital();

    }

    private function namesCapital(){

        $namesCapital[1] = Yii::t('app', 'Heliotrope');
        $namesCapital[2] = Yii::t('app', 'Amethyst');
        $namesCapital[3] = Yii::t('app', 'Jade');
        $namesCapital[4] = Yii::t('app', 'Agate');
        $namesCapital[5] = Yii::t('app', 'Garnet');
        $namesCapital[6] = Yii::t('app', 'Beryl');
        $namesCapital[7] = Yii::t('app', 'Calcite');
        $namesCapital[8] = Yii::t('app', 'Emerald');
        $namesCapital[9] = Yii::t('app', 'Serpentine stone');
        $namesCapital[10] = Yii::t('app', 'Ruby');
        $namesCapital[11] = Yii::t('app', 'Kyanite');
        $namesCapital[12] = Yii::t('app', 'Jasper');
        $namesCapital[13] = Yii::t('app', 'Coral');
        $namesCapital[14] = Yii::t('app', 'Diamond');
        $namesCapital[15] = Yii::t('app', 'Cat\'s eye');
        $namesCapital[16] = Yii::t('app', 'Opal');
        $namesCapital[17] = Yii::t('app', 'Lapis lazuli');
        $namesCapital[18] = Yii::t('app', 'Turquoise');
        $namesCapital[19] = Yii::t('app', 'Malachite');
        $namesCapital[20] = Yii::t('app', 'Onyx');
        $namesCapital[21] = Yii::t('app', 'Obsidian');
        $namesCapital[22] = Yii::t('app', 'Sapphire');
        $namesCapital[23] = Yii::t('app', 'Moon rock');
        $namesCapital[24] = Yii::t('app', 'Chrysolite');
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

