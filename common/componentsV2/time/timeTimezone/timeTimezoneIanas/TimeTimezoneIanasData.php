<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIanas;


use Yii;

class TimeTimezoneIanasData
{

    public $data;

    public function __construct()
    {
        $this->data = Yii::$app->db
            ->createCommand('
            select
            *
            from
            time_timezone_iana as tti
            order by zone_name asc
            limit 100
            ')
            ->queryAll();
    }
}
