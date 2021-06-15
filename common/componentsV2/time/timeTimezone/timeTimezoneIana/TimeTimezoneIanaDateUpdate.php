<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIana;

class TimeTimezoneIanaDateUpdate
{

    public $date;
    public $offset;
    public $offsetSimple;
    public $data;


    public function __construct($data)
    {
        $this->data = $data->data;

        $this->date = (new \DateTime())->setTimezone(new \DateTimeZone($this->data['zone_name']));
        $this->offset = $this->date->format('P');
        $this->offsetSimple = $this->date->format('O');
    }

}
