<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;

use Yii;


class TimeLocationCitiesByIanas
{


    public $data;
    public $languageID;
    public function __construct($data, $languageID)
    {

        $this->data = $data->data;
        $this->languageID = $languageID;

        if (isset($this->data->timezone->ianaData)) {
            foreach ($this->data->timezone->ianaData as $key => $iana) {
                if ($iana) {
                    $data = Yii::$app->db
                        ->createCommand('
                    select
                    tc.timezone,
                    tc.url,
                    tc.population,
                    tc.name as cityNameOriginal,
                    tct.name,
                    tct.name_in,
                    tct.name_for,
                    tct.languages_id as languageID, 
                    tcot.name as countryName,
                    tco.url as countryUrl
                    from
                    time_cities as tc
                    left join time_cities_text as tct on tc.id = tct.time_cities_id
                    left join time_countries as tco on tco.iso_alpha2 = tc.country_code
                    left join time_countries_text as tcot on tcot.time_countries_id = tco.id
                    where
                    tct.languages_id = :languageID
                    and 
                    tc.timezone = :timezone
                    and 
                    tcot.languages_id = :languageID
                    order by tc.population desc
                    limit 10
                    ', [':languageID' => $languageID, ':timezone' => $iana['timezone_id']])
                        ->queryAll();


                    if ($data){
                        $this->data->timezone->ianaData[$key]['cities'] = $data;
                    }

                } else {
                    $this->data = 0;
                }
            }
        }

    }
}
