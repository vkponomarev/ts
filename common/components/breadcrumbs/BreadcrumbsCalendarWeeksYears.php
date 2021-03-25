<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarWeeksYears
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Calendar'),
        ];

        $breadcrumbs['last'] = Yii::t('app', 'Calendar with week numbers');

        return $breadcrumbs;

    }

}

