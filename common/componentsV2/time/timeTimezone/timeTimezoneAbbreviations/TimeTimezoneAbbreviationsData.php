<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviations;


use Yii;

class TimeTimezoneAbbreviationsData
{

    public $data;

    /**
     * TimeTimezoneAbbreviationsData constructor.
     * @param $languageID
     */
    public function __construct($languageID)
    {

        $this->data = Yii::$app->db
            ->createCommand('
            select
            *
            from
            time_timezone as tt
            left join time_timezone_text as ttt on tt.id = ttt.time_timezone_id
            where tt.active = 1
            and 
            ttt.languages_id = 2
            order by abbreviation asc
            ')
            ->queryAll();
    }
}
