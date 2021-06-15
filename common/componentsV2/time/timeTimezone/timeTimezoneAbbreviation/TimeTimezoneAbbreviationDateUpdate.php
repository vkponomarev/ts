<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviation;

class TimeTimezoneAbbreviationDateUpdate
{

    public $date;
    public $offset;
    public $offsetSimple;

    public $timeDate;
    public $timeOffset;
    public $timeOffsetSimple;

    public $data;

    public function __construct($data)
    {
        $this->data = $data->data;


        $this->date = (new \DateTime())->setTimezone(new \DateTimeZone(mb_strtolower($data->data['abbreviation'])));
        //$this->date = (new \DateTime())->setTimezone(new \DateTimeZone($this->data['offset_hours']));
        $this->offset = $this->date->format('P');
        $this->offsetSimple = $this->date->format('O');
        
    }

}
