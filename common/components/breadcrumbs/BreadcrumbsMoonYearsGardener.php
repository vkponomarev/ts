<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsMoonYearsGardener
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $gardenerNameURL)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/moon/years/' . $dateData->year->current,
            'text' => $dateData->year->current,
        ];

        if ($gardenerNameURL){
            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/moon/gardener/years/' . $dateData->year->current,
                'text' => Yii::t('app', 'Sowing calendar'),
            ];

            $breadcrumbs['last'] = '';

        } else {
            $breadcrumbs['last'] = Yii::t('app', 'Sowing calendar');
        }

        return $breadcrumbs;

    }

}

