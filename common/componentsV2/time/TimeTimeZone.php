<?php

namespace common\componentsV2\time;

use Yii;
use yii\web\NotFoundHttpException;


class TimeTimeZone
{

    public $current;

    /**
     * @var \DateTime Дата и время текущего часового пояса
     */
    public $date;
    //public $array;

    /**
     * TimeTimeZone constructor.
     * @param $timeZoneID
     * @param $languageID
     * @param $UTC \DateTime
     */
    public function __construct($timeZoneID, $languageID, $UTC)
    {
        $this->current = $this->timeZone($timeZoneID, $languageID);

        $this->date = $UTC->setTimezone(
            new \DateTimeZone(
                timezone_name_from_abbr("", $this->current['offset'], false)
            )
        );
    }

    private function timeZone($timeZoneID, $languageID){

        $timeZone = Yii::$app->db
            ->createCommand('
            select
            *
            from
            time_timezone as tt
            left join time_timezone_text as ttt on tt.id = ttt.time_timezone_id
            where tt.active = 1
            and 
            tt.id = :timeZoneID
            and 
            ttt.languages_id = :languageID
            order by abbreviation asc
            ', [':languageID' => $languageID, ':timeZoneID' => $timeZoneID])
            ->queryOne();

        return $timeZone;
    }




}

