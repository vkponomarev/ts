<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIanas;


class TimeTimezoneIanasDataAll
{

    public $ianaDB;
    public $timezone;

    public function __construct($timezone)
    {

        $this->timezone = $timezone;
        $this->ianaDB = \Yii::$app->db
            ->createCommand('
            select
            tti.id,
            tti.country_code,
            tti.zone_name,
            tti.url
            from
            time_timezone_iana as tti
            ')
            ->queryAll();
    }

}

