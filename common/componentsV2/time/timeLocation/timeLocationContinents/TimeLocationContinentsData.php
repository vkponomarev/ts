<?php

namespace common\componentsV2\time\timeLocation\timeLocationContinents;


class TimeLocationContinentsData
{

    public $data;
    /**
     * TimeCity constructor.
     * @param $city
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($languageID)
    {
        $this->data = \Yii::$app->db
            ->createCommand('
            select
            tc.url,
            tc.name as nameOriginal,
            tct.name as name,
            tct.name_in as nameIn,
            tct.name_for as nameFor
            from
            time_continents as tc
            left join time_continents_text as tct on tc.id = tct.time_continents_id
            where
            tct.languages_id = :languageID
            ORDER BY tc.name ASC 
            ', [':languageID' => $languageID])
            ->queryAll();
    }
}
