<?php

namespace common\componentsV2\time\timeDifference;

class TimeDifferenceCalculationLocation
{

    public $date;
    public $name;
    /**
     * TimeDifferenceHours constructor.
     * @param $locationOneDate \DateTime
     * @param $locationTwoDate \DateTime
     * @throws \Exception
     */
    public function __construct($data)
    {
        $this->date = ($data) ? $data->city->date : 0 ;
        $this->name = ($data) ? 'location' : 0 ;
    }
}
