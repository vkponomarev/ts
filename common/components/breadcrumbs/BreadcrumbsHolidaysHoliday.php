<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsHolidaysHoliday
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $countryURL, $holidayData)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'holidays/years/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
            'text' => $dateData->year->current,
        ];

        $breadcrumbs['last'] = $holidayData['holidayName'];

        return $breadcrumbs;

    }

}

