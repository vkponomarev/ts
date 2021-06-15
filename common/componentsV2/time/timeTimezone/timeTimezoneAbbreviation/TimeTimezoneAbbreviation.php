<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviation;

use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesByIanas;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesByIanasDateUpdate;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesByIanasNameUpdate;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesByTimezoneAbbreviation;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesByTimezoneAbbreviationList;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesDateUpdate;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesNameUpdate;
use common\componentsV2\time\timeTimezone\timeTimezoneIanas\TimeTimezoneIanasByAbbreviation;
use common\componentsV2\time\timeTimezone\timeTimezoneIanas\TimeTimezoneIanasDataAll;
use common\componentsV2\time\timeTimezone\timeTimezoneIanas\TimeTimezoneIanasDateUpdate;
use common\componentsV2\time\timeTimezone\timeTimezoneIanas\TimeTimezoneIanasResult;
use common\componentsV2\time\timeTimezone\timeTimezoneIanas\TimeTimezoneIanasUrlUpdate;


class TimeTimezoneAbbreviation
{


    public $abbreviation;
    public $name;

    public $date;
    public $offset;
    public $offsetSeconds;
    public $offsetSimple;

    public $timeDate;
    public $timeOffset;
    public $timeOffsetSeconds;
    public $timeOffsetSimple;

    public $url;
    public $abbreviationIana;
    public $cities;
    public $timezonesList;
    public $timeOffsets;
    public $ianas;
    private $timeData;
    private $data;


    /**
     * TimeTimezoneAbbreviation constructor.
     * @param $params
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($params, $languageID)
    {
        $this->data =
            (new TimeTimezoneAbbreviationTextUpdate(
                new TimeTimezoneAbbreviationDateUpdate(
                    new TimeTimezoneAbbreviationData($params, $languageID)
                ), $params
            ))->data;

        /**
         * Список часовых поясов iana с городами.
         * @var TimeTimezoneIanasResult
         */
        $this->ianas =
            new TimeTimezoneIanasResult(
                (new TimeLocationCitiesByIanasDateUpdate(
                    new TimeLocationCitiesByIanasNameUpdate(
                        new TimeLocationCitiesByIanas(
                            new TimeTimezoneIanasUrlUpdate(
                                new TimeTimezoneIanasDateUpdate(
                                    new TimeTimezoneIanasDataAll(
                                        new TimeTimezoneIanasByAbbreviation($this->data, $params
                                        )))), $languageID)))), $this->data);

        $this->timeOffsets =
            (new TimeTimezoneAbbreviationTimeOffsets())->data;

        if (isset($params['timezone']['abbreviationTime']) && $params['timezone']['abbreviationTime']) {

            $this->timeData =
                (new TimeTimezoneAbbreviationTimeTextUpdate(
                    new TimeTimezoneAbbreviationTimeDateUpdate($params['timezone']['abbreviationTime'], $this->data)
                ))->data;


            //$this->data->offsetSimple;
            $this->timeDate = $this->timeData->timeDate;
            $this->timeOffset = $this->timeData->timeOffset;
            $this->timeOffsetSeconds = $this->timeData->timeOffsetSeconds;
            $this->timeOffsetSimple = $this->timeData->timeOffsetSimple;
            $this->data->offsetSimple = $this->timeData->timeOffsetSimple;
            $this->data->date = $this->timeDate;
        }

        $this->abbreviation = $this->data->data['abbreviation'];
        $this->name = $this->data->data['name'];
        $this->url = $this->data->data['url'];
        $this->offsetSeconds = $this->data->date->getOffset();
        $this->offset = $this->data->offset;
        $this->offsetSimple = $this->data->offsetSimple;
        $this->date = $this->data->date;

    }
}
