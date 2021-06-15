<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIanas;


class TimeTimezoneIanasUrlUpdate
{

    public $data;
    public $date;
    public function __construct($data)
    {
        $this->data = $data->data;

        foreach ($this->data->timezone->ianaData as $key => $item) {
            $key2 = array_search($item['timezone_id'], array_column($this->data->ianaDB, 'zone_name'));
            if ($key2) {
                $this->data->timezone->ianaData[$key]['url'] = $this->data->ianaDB[$key2]['url'];
            } else {
                unset($this->data->timezone->ianaData[$key]);
            }
        }

    }

}

