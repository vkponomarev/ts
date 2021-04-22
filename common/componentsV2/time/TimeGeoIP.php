<?php

namespace common\componentsV2\time;

use Yii;


class TimeGeoIP
{

    public $name;
    public $timeZone;

    public $data;
    /**
     * @var \DateTime Дата и время текущего часового пояса
     */
    public $date;

    public $offset;
    public $offsetSimple;
    //public $array;

    public function __construct($geoNameID, $languageID)
    {
        $this->name = '';
        $this->timeZone = '';
        $this->date = '';
        $this->offset = '';
        $this->offsetSimple = '';

        if ($this->data = $this->getGeoName($geoNameID, $languageID)) {
            $this->name = $this->data['name'];
            $this->timeZone = $this->data['timezone'];
            $this->date = (new \DateTime())->setTimezone(new \DateTimeZone($this->timeZone));
            $this->offset = $this->date->format('P');
            $this->offsetSimple = $this->date->format('O');
        }

    }

    private function getGeoName($geoNameID, $languageID)
    {

        $geoName = Yii::$app->db
            ->createCommand('
            select
            *
            from
            time_cities as tc
            left join time_cities_text as tct on tc.id = tct.time_cities_id
            where
            tc.id = :geoNameID
            and 
            tct.languages_id = :languageID
            ', [':languageID' => $languageID, ':geoNameID' => $geoNameID])
            ->queryOne();

        return $geoName;
    }


}

