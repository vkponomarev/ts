<?php

namespace common\componentsV2\time\timeDifference;

class TimeDifferenceCalculationTimezone
{

    public $date;
    public $name;
    /**
     * TimeDifferenceHours constructor.
     * @throws \Exception
     */
    public function __construct($data, $timezone)
    {
        $this->date = ($data->date) ? $data->date :
            ((isset($timezone->date)) ? $timezone->date : 0);
        $this->name = ($data->name) ? $data->name :
            ((isset($timezone->date)) ? 'timezone' : 0);

    }
}
