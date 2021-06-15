<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIanas;


class TimeTimezoneIanasDateUpdate
{

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
        if ($this->data->timezone->ianaData) {

            foreach ($this->data->timezone->ianaData as $key => $zone) {

                $this->data->timezone->ianaData[$key]['date'] = (new \DateTime())->setTimezone(new \DateTimeZone($zone['timezone_id']));
                $this->data->timezone->ianaData[$key]['offset'] = $this->data->timezone->ianaData[$key]['date']->format('P');
                $this->data->timezone->ianaData[$key]['offsetSimple'] = $this->data->timezone->ianaData[$key]['date']->format('O');
            }

        } else {
            $this->data = 0;
        }

    }

}

