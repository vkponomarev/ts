<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsHolidaysDays
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $countryURL, $countryData)
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


        $breadcrumbs['urls'][++$count] =  [
            'url' => 'holidays/seasons/' . $dateData->season->currentURL . '/' . $dateData->year->current,
            'text' => $dateData->season->currentName,
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'holidays/months/' . $dateData->year->current . '-' . $dateData->month->current . (($countryURL)? '/' .  $countryURL : ''),
            'text' => $dateData->month->current,
        ];


        $breadcrumbs['last'] = $dateData->day->current;

        return $breadcrumbs;

    }

}

