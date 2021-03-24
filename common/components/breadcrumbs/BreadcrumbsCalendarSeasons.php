<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarSeasons
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $seasonURL, $countryURL)
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

        $breadcrumbs['urls'][$count] = [
            'url' => 'calendar/years/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
            'text' => $dateData->year->current,
        ];

        $breadcrumbs['last'] = $seasonNow;

        return $breadcrumbs;

    }

}

