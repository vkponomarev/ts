<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIana;


use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesByTimezoneIana;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesDateUpdate;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesNameUpdate;

class TimeTimezoneIana
{

    public $name;
    public $date;
    public $cities;
    public $offset;
    public $offsetSeconds;
    public $offsetSimple;
    public $url;
    private $data;

    /**
     * TimeTimezoneAbbreviations constructor.
     * @param $params
     * @param $languageID
     */
    public function __construct($params, $languageID)
    {
        $this->data =
            (new TimeTimezoneIanaTextUpdate(
                new TimeTimezoneIanaDateUpdate(
                    new TimeTimezoneIanaData($params)
                )))->data;

        $this->cities =
            (new TimeLocationCitiesDateUpdate(
                new TimeLocationCitiesNameUpdate(
                    new TimeLocationCitiesByTimezoneIana(
                        $this->data->data['zone_name'],
                        $languageID
                    ))))->data;

        $this->name = $this->data->data['zone_name'];
        $this->url = $this->data->data['url'];
        $this->offsetSeconds = $this->data->date->getOffset();
        $this->offset = $this->data->offset;
        $this->offsetSimple = $this->data->offsetSimple;
        $this->date = $this->data->date;

    }
}
