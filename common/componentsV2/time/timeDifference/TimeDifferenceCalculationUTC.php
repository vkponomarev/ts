<?php

namespace common\componentsV2\time\timeDifference;

class TimeDifferenceCalculationUTC
{

    public $date;
    public $name;

    public function __construct($data, $UTC)
    {

        $this->date = ($data->date) ? $data->date :
            ((isset($UTC)) ? $UTC : 0);

        $this->name = ($data->name) ? $data->name :
            ((isset($UTC)) ? 'UTC' : 0);

    }
}
