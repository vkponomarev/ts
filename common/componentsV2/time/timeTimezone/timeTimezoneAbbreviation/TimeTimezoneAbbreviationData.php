<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviation;


use Yii;

class TimeTimezoneAbbreviationData
{

    public $data;

    /**
     * TimeTimezoneAbbreviationsData constructor.
     * @param $languageID
     */
    public function __construct($params ,$languageID)
    {

        $this->data = Yii::$app->db
            ->createCommand('
            select
            *
            from
            time_timezone as tt
            left join time_timezone_text as ttt on tt.id = ttt.time_timezone_id
            where 
            tt.id = :timezoneID
            and 
            ttt.languages_id = 2
            ', [
                ':timezoneID' => $params['timezone']['abbreviationID'],
                //':languageID' => $languageID
                ])
            ->queryOne();
    }
}
