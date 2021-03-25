<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsMoonMonthsGood
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $dayNameURL)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Calendar'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/moon/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Lunar Calendar'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/moon/good/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Auspicious days'),
        ];

        if ($dayNameURL){

            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/moon/good/months/' . $dateData->year->current . '-' . $dateData->month->current ,
                'text' => $dateData->month->nameFullSimple,
            ];
        } else {
            $breadcrumbs['last'] = $dateData->month->nameFullSimple;
        }



        return $breadcrumbs;

    }

}

