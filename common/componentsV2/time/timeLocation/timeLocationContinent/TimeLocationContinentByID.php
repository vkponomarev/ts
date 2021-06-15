<?php

namespace common\componentsV2\time\timeLocation\timeLocationContinent;

use Yii;
class TimeLocationContinentByID
{

    public $data;


    /**
     * TimeCity constructor.
     * @param $city
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($continentID, $languageID)
    {
        $this->data = Yii::$app->db
            ->createCommand('
            select
            tc.url,
            tc.code,
            tc.name as nameOriginal,
            tct.name as name,
            tct.name_in as nameIn,
            tct.name_for as nameFor
            from time_continents as tc
            left join time_continents_text as tct on tct.time_continents_id = tc.id
            where
            tct.languages_id = :languageID
            and 
            tc.id = :continentID
            ', [':languageID' => $languageID, ':continentID' => $continentID])
            ->queryOne();
    }
}
