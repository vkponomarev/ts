<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarEastern
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

        $breadcrumbs['last'] = Yii::t('app', 'Eastern calendar');

        return $breadcrumbs;

    }

}
