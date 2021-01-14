<?php

namespace common\components\main;


use Yii;

class MainMenu
{


    function menu()
    {
        return [
            'dateData'=>$this->dateData(),
        ];
    }

    function dateData()
    {

        $date = new \DateTime();
        $yearFull = $date->format('Y');

        $dateData['year'] = [
            'previous' => str_pad($yearFull - 1, 4, '0', STR_PAD_LEFT),
            'previousTwo' => str_pad($yearFull - 2, 4, '0', STR_PAD_LEFT),
            'nextTwo' => str_pad($yearFull + 1, 4, '0', STR_PAD_LEFT),
            'nextTwo' => str_pad($yearFull + 2, 4, '0', STR_PAD_LEFT),
            'now' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
        ];

        return $dateData;
    }


}

