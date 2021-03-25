<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarMonths
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $countryURL, $countryData)
    {

        $count = 0;


        if ($countryURL){

            $breadcrumbs['urls'][$count] =  [
                'url' => 'calendar/years/' . $dateData->year->current,
                'text' => Yii::t('app', 'Calendar'),
            ];

            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/years/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
                'text' => $countryData['name'],
            ];

            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/seasons/' . $dateData->season->currentURL . '/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
                'text' => $dateData->season->currentName,
            ];

            $breadcrumbs['last'] = $dateData->month->nameFullSimple;


        } else {


            $breadcrumbs['urls'][$count] =  [
                'url' => 'calendar/years/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
                'text' => Yii::t('app', 'Calendar'),
            ];

            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/seasons/' . $dateData->season->currentURL . '/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
                'text' => $dateData->season->currentName,
            ];

            $breadcrumbs['last'] = $dateData->month->nameFullSimple;

        }


        return $breadcrumbs;

    }

}

