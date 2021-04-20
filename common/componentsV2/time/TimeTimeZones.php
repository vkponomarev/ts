<?php

namespace common\componentsV2\time;

use Yii;
use yii\web\NotFoundHttpException;


class TimeTimeZones
{

    //public $current;
    public $array;

    public function __construct($languageID)
    {
        $this->array = $this->timeZones($languageID);
    }

    private function timeZones($languageID){

        $timeZones = Yii::$app->db
            ->createCommand('
            select
            *
            from
            time_timezone as tt
            left join time_timezone_text as ttt on tt.id = ttt.time_timezone_id
            where tt.active = 1
            and 
            ttt.languages_id = :languageID
            order by abbreviation asc
            ', [':languageID' => $languageID])
            ->queryAll();

        return $timeZones;
    }
}

