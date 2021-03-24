<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsMoonYearsPhases
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $phaseURL)
    {

        $count = 0;

        if ($phaseURL == 'new-moon'){
            $phase = Yii::t('app', 'New moon');
        }
        if ($phaseURL == 'waxing-moon'){
            $phase = Yii::t('app', 'Growing moon');
        }
        if ($phaseURL == 'full-moon'){
            $phase = Yii::t('app', 'Full moon');
        }
        if ($phaseURL == 'waning-moon'){
            $phase = Yii::t('app', 'Waning moon');
        }


        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/moon/phase/years/' . $dateData->year->current,
            'text' => $dateData->year->current,
        ];

        $breadcrumbs['last'] = $phase;

        return $breadcrumbs;

    }

}

