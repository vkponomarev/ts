<?php

namespace common\componentsV2\time\timeGeoIP;


class TimeGeoIPGeoNameData
{


    public $data;
    public $active;
    public $reader;

    /**
     * TimeGeoIPGeoNameData constructor.
     * @param $reader \common\componentsV2\time\timeGeoIP\TimeGeoIPReader
     * @param $languageID
     * @throws \yii\db\Exception
     */
    public function __construct($reader, $languageID)
    {

        $this->reader = $reader;

        if ($this->reader->record[$this->reader->session->ip]) {

            $this->data = \Yii::$app->db
                ->createCommand('
            select
            tc.id,
            tc.timezone as timezone,
            tc.name as cityNameOriginal,
            tc.url as cityUrl,
            tc.population,
            tc.latitude,
            tc.longitude,
            tct.name as cityName,
            tct.name_in as cityNameIn,
            tct.name_for as cityNameFor,
            tco.name as countryNameOriginal,
            tco.url as countryUrl,
            tcot.name as countryName,
            tcot.name as countryNameIn,
            tcot.name as countryNameFor
            from
            time_cities as tc
            left join time_cities_text as tct on tc.id = tct.time_cities_id
            left join time_countries as tco on tc.country_code = tco.iso_alpha2
            left join time_countries_text as tcot on tco.id = tcot.time_countries_id
            where
            tc.id = :geoNameID
            and 
            tct.languages_id = :languageID
            and 
            tcot.languages_id = :languageID
            ', [':languageID' => $languageID, ':geoNameID' => $reader->record[$reader->session->ip]->city->geonameId])
                ->queryOne();

            if ($this->data) {
                if (($languageID == 1) && ($this->data['population'] < 745261)) {
                    $this->data['cityName'] = $this->data['cityNameOriginal'];
                    $this->data['cityNameIn'] = $this->data['cityNameOriginal'];
                    $this->data['cityNameFor'] = $this->data['cityNameOriginal'];
                }

                if (($languageID <> 1)) {
                    $this->data['cityName'] = $this->data['cityNameOriginal'];
                    $this->data['cityNameIn'] = $this->data['cityNameOriginal'];
                    $this->data['cityNameFor'] = $this->data['cityNameOriginal'];
                }
            }
        }
        $this->active = ($this->data) ? 1 : 0;
    }

}

