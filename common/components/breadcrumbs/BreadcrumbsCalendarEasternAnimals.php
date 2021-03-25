<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarEasternAnimals
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @param $eastern \common\componentsV2\eastern\Eastern
     * @return mixed
     */
    public function breadcrumbs($eastern, $dateData)
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

        $breadcrumbs['last'] = $eastern->animal->name;

        return $breadcrumbs;

    }

}

