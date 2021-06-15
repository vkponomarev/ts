<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviation;

class TimeTimezoneAbbreviationTimeOffsets
{

    public function __construct()
    {

        $this->data = \Yii::$app->db
            ->createCommand('
            select
            id,
            url,
            offset
            from
            time_timezone_offset
            order by url asc
            ')
            ->queryAll();

    }

}
