<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviation;

class TimeTimezoneAbbreviationTimeData
{

    public function __construct()
    {

        $this->data = Yii::$app->db
            ->createCommand('
            select
            id,
            url
            from
            time_timezone_offset
            ')
            ->queryOne();

    }

}
