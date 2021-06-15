<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIana;

class TimeTimezoneIanaByName
{

    public $abbreviation;
    private $abbreviationIana;

    public function __construct($params)
    {

        $this->data = Yii::$app->db
            ->createCommand('
            select
            *
            from
            time_timezone_iana as tti
            where 
            id = :timezoneID
            ', [':timezoneID' => $params['timezone']['ianaID']])
            ->queryOne();

    }
}
