<?php

namespace common\componentsV2\time\timeLocation\timeLocationCountry;


class TimeLocationCountryByCode
{

    public $data;
    /**
     * TimeCity constructor.
     * @param $city
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($countryCode, $languageID)
    {
        $this->data = \Yii::$app->db
            ->createCommand('
            select
            tc.country_code,
            tc.timezone,
            tc.url,
            tc.name as originalName,
            tct.name,
            tct.name_in,
            tct.name_for
            from
            time_cities as tc
            left join time_cities_text as tct on tc.id = tct.time_cities_id
            where
            tc.id = :geoNameID
            and
            tct.languages_id = :languageID
            ', [':languageID' => $languageID, ':geoNameID' => $geoNameID])
            ->queryOne();
    }
}
