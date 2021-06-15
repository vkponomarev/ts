<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviation;

class TimeTimezoneAbbreviationTimeDateUpdate
{

    public $timeDate;
    public $timeOffset;
    public $timeOffsetSimple;
    public $timeOffsetSeconds;

    public function __construct($zoneTime, $data)
    {
        mb_internal_encoding("UTF-8");
        $sign = mb_substr($zoneTime, 0, 1);
        $hours = mb_substr($zoneTime, 1, 2);
        $minutes = mb_substr($zoneTime, 3, 4);
        $this->timeDate = new \DateTime($data->date->format('Y-m-d H:i:s'));

        //(new \common\components\dump\Dump())->printR($sign,'$sign');
        //(new \common\components\dump\Dump())->printR($hours,'$hours');
        //(new \common\components\dump\Dump())->printR($minutes,'$minutes');


        if ($sign == '+') {
            $this->timeDate = $this->timeDate->add(new \DateInterval('PT' . $hours . 'H' . $minutes . 'M'));
            $this->timeOffsetSeconds = $data->date->getOffset() + (($hours * 60 * 60) + ($minutes * 60));
        } else {
            $this->timeDate = $this->timeDate->sub(new \DateInterval('PT' . $hours . 'H' . $minutes . 'M'));
            $this->timeOffsetSeconds = $data->date->getOffset() - (($hours * 60 * 60) + ($minutes * 60));
        }
        //(new \common\components\dump\Dump())->printR($data->date,'$data->date');
        //(new \common\components\dump\Dump())->printR($data->date->getOffset(),'$data->date->getOffset()');
        //(new \common\components\dump\Dump())->printR($hours,'$hours');
        //(new \common\components\dump\Dump())->printR($minutes,'$minutes');
        //(new \common\components\dump\Dump())->printR($this->timeDate,'$this->timeDate');
        //(new \common\components\dump\Dump())->printR($this->timeOffsetSeconds,'$this->timeOffsetSeconds');

        $this->timeOffset = mb_substr($zoneTime, 0, 3) . ':' . mb_substr($zoneTime, 3, 4);
        $this->timeOffsetSimple = $zoneTime;
    }

}
