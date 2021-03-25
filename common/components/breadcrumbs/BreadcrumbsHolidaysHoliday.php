<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsHolidaysHoliday
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $countryURL, $holidayData, $countryData)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'holidays/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Holidays'),
        ];


        if ($countryURL){
            $breadcrumbs['urls'][++$count] =  [
                'url' => 'holidays/years/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
                'text' => $countryData['name'],
            ];


        }


        $breadcrumbs['last'] = $holidayData['holidayName'];

        return $breadcrumbs;

    }

}

