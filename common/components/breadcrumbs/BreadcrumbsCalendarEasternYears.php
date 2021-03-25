<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarEasternYears
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

        $breadcrumbs['urls'][++$count] = [
            'url' => 'calendar/eastern',
            'text' => Yii::t('app', 'Eastern calendar'),
        ];

        $breadcrumbs['last'] = $dateData->year->current;

        return $breadcrumbs;

    }

}

