<?php

namespace common\componentsV2\time\timeDifference;

class TimeDifferenceCalculation
{

    public $hours;
    public $name;
    private $date;
    /**
     * TimeDifferenceHours constructor.
     * @throws \Exception
     */
    public function __construct($data, $location)
    {
        $offsetOne = $location->city->date->getOffset() / 3600;
        $offsetTwo = $data->date->getOffset() / 3600;
        $this->hours = $offsetTwo - $offsetOne;

        $this->name = ($data->name)? $data->name : 0 ;

    }
}
