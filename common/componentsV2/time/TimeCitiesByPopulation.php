<?php

namespace common\componentsV2\time;

use Yii;
use yii\web\NotFoundHttpException;


class TimeCitiesByPopulation
{

    function data($languageID){

        //Заглушка до завершения переводов названий стран на разные языки
        $languageID = 2;

        $data = Yii::$app->db
            ->createCommand('
            select
            tct.name,
            tc.timezone
            from
            time_cities as tc
            left join time_cities_text as tct on tc.id = tct.time_cities_id
            where
            tct.languages_id = :languageID
            order by population desc
            limit 10
            ', [':languageID' => $languageID])
            ->queryAll();

        return $data;

    }


}

/*
SELECT FROM_UNIXTIME(UNIX_TIMESTAMP(UTC_TIMESTAMP()) + tz.gmt_offset, '%a, %d %b %Y, %H:%i:%s') AS local_time
FROM `time_timezones` tz JOIN `time_zones` z
ON tz.zone_id=z.zone_id
WHERE tz.time_start <= UNIX_TIMESTAMP(UTC_TIMESTAMP()) AND z.zone_name='America/Los_Angeles'
ORDER BY tz.time_start DESC LIMIT 1;
 */