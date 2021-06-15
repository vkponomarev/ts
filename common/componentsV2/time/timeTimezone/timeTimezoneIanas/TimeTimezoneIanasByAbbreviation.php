<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIanas;


class TimeTimezoneIanasByAbbreviation
{

    public $ianaData;
    public $date;

    public function __construct($data, $params)
    {
        $timezoneAbbreviations = \DateTimeZone::listAbbreviations();

        if (isset($timezoneAbbreviations[mb_strtolower($data->data['abbreviation'])])) {
            $this->date = (new \DateTime())->setTimezone(new \DateTimeZone(mb_strtolower($data->data['abbreviation'])));
            $this->ianaData = $timezoneAbbreviations[mb_strtolower($data->data['abbreviation'])];
        }

        if ($data->data['abbreviation'] == 'UTC') {
            $this->ianaData = $timezoneAbbreviations['gmt'];
        }

        if (isset($params['timezone']['abbreviationTime']) && $params['timezone']['abbreviationTime']) {


        }


    }

}

