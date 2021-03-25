<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsZodiacDays
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'zodiac',
            'text' => Yii::t('app', 'Zodiac signs'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/zodiac/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Calendar'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/zodiac/months/' . $dateData->year->current . '-' . $dateData->month->current,
            'text' => $dateData->month->nameFullSimple,
        ];

        $breadcrumbs['last'] = $dateData->day->current;

        return $breadcrumbs;

    }

}

