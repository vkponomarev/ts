<?php

namespace common\componentsV2\time;

use Yii;
use yii\web\NotFoundHttpException;


class TimeUpdateDataTime
{

    function update($data, $UTC){

        foreach ($data as $key => $item){

            $timeZoneSet = $UTC;
            $timeZoneSet->setTimeZone(new \DateTimeZone($item['timezone']));
            $data[$key]['date'] = $timeZoneSet->format('Y-m-d');

        }
        return $data;

    }

}
