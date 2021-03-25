<?php

namespace common\components\breadcrumbs;

use Yii;
use yii\console\widgets\Table;

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
            'url' => 'calendar/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Calendar'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/weeks/' . $dateData->year->current,
            'text' => Yii::t('app', 'Calendar with week numbers'),
        ];

        $breadcrumbs['last'] = Yii::t('app', '{week} week', ['week' => $dateData->week->current]);

        return $breadcrumbs;

    }

}

