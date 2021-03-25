<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarSeasons
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $seasonURL, $countryURL, $countryData)
    {

        $count = 0;

        if ($seasonURL == 'spring')
            $seasonNow = Yii::t('app', 'Spring');

        if ($seasonURL == 'summer')
            $seasonNow = Yii::t('app', 'Summer');

        if ($seasonURL == 'winter')
            $seasonNow = Yii::t('app', 'Winter');

        if ($seasonURL == 'autumn')
            $seasonNow = Yii::t('app', 'Autumn');

        if ($countryURL){
            $breadcrumbs['urls'][$count] = [
                'url' => 'calendar/years/' . $dateData->year->current,
                'text' => Yii::t('app', 'Calendar'),
            ];

            $breadcrumbs['urls'][++$count] = [
                'url' => 'calendar/years/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
                'text' => $countryData['name'],
            ];

            $breadcrumbs['last'] = $seasonNow;

        } else {

            $breadcrumbs['urls'][$count] = [
                'url' => 'calendar/years/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
                'text' => Yii::t('app', 'Calendar'),
            ];

            $breadcrumbs['last'] = $seasonNow;

        }



        return $breadcrumbs;

    }

}

