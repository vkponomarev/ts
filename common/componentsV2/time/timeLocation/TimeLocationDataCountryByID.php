<?php

namespace common\componentsV2\time\timeLocation;


use common\componentsV2\time\timeLocation\timeLocationCity\TimeLocationCity;
use common\componentsV2\time\timeLocation\timeLocationCountry\TimeLocationCountry;

class TimeLocationDataCountryByID
{

    public $data;

    /**
     * TimeLocationDataCityByID constructor.
     * @param $cityID
     * @param $languageID
     * @throws \yii\db\Exception
     */
    public function __construct($countryID, $languageID)
    {
        $this->data = \Yii::$app->db
            ->createCommand('
            select
            tc.iso_alpha2 as countryCode,
            tc.url as countryUrl,
            tc.name as countryNameOriginal,
            tct.name as countryName,
            tct.name_in as countryNameIn,
            tct.name_for as countryNameFor
            from
            time_countries as tc
            left join time_countries_text as tct on tc.id = tct.time_countries_id
            where
            tc.id = :countryID
            and
            tct.languages_id = :languageID
            ', [':languageID' => $languageID, ':countryID' => $countryID])
            ->queryOne();

    }
}
