<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarWeeksWeek
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @param $weekURL array [url,simple]
     * @return mixed
     */
    public function breadcrumbs($dateData, $weekURL)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/weeks/' . $dateData->year->current,
            'text' => $dateData->year->current,
        ];

        $breadcrumbs['last'] = Yii::t('app', '{week} week', ['week' => $weekURL['url']]);

        return $breadcrumbs;

    }

}

