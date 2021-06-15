<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIanas;


class TimeTimezoneIanasResult
{
    /**
     * @var \DateTime
     */
    public $ianaData;
    public $date;

    public function __construct($data, $data2)
    {


        if ($data->data) {
            $this->ianaData = $data->data->timezone->ianaData;
            $this->date = $data->data->timezone->date;

            /**
             * @var $item \DateTime
             */
            foreach ($this->ianaData as $key => $item) {
                if ($item['date']->format('H-i') == $data2->date->format('H-i')) {
                } else {
                    unset($this->ianaData[$key]);
                }
            }
        }


    }

}

