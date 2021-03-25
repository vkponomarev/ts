<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsMoonYearsGood
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

        if ($dayNameURL){
            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/moon/good/years/' . $dateData->year->current,
                'text' => Yii::t('app', 'Auspicious days'),
            ];

            $breadcrumbs['last'] = '';

        } else {
            $breadcrumbs['last'] = Yii::t('app', 'Auspicious days');
        }



        return $breadcrumbs;

    }

}

