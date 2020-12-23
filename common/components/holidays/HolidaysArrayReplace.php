<?php

namespace common\components\holidays;

class HolidaysArrayReplace
{

    public function holidays($holidaysData)
    {
        $holiday = 0;

        foreach ($holidaysData as $key => $value) {
            if ($value['holiday'] <> 0 or $value['holiday'] <> 1) {
                $explode = explode(',', $value['holiday']);
                foreach ($explode as $item) {
                    if ($item == 1) {
                        $holiday = 1;
                    }
                }
                $holidaysData[$key]['holiday'] = $holiday;
            }
            $holiday = 0;
        }
        return $holidaysData;
    }

}

