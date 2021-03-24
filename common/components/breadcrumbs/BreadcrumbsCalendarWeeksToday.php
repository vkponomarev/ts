<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarWeeksToday
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData)
    {
        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/weeks/' . $dateData->year->current,
            'text' => $dateData->year->current,
        ];

        $breadcrumbs['last'] = Yii::t('app', '{week} week', ['week' => $dateData->week->current]);

        return $breadcrumbs;

    }

}

