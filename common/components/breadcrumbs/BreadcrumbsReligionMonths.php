<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsReligionMonths
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $religionURL)
    {

        $count = 0;

        if ($religionURL == 'orthodox'){
            $religion = Yii::t('app', 'Orthodox calendar');
        }

        if ($religionURL == 'catholic'){
            $religion = Yii::t('app', 'Catholic calendar');
        }

        if ($religionURL == 'muslim'){
            $religion = Yii::t('app', 'Muslim calendar');
        }

        if ($religionURL == 'jewish'){
            $religion = Yii::t('app', 'Jewish calendar');
        }

        if ($religionURL == 'hindu'){
            $religion = Yii::t('app', 'Hindu calendar');
        }


        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/years/' . $dateData->year->current,
            'text' => $dateData->year->current,
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/religion/'. $religionURL. '/years/' . $dateData->year->current,
            'text' => $religion,
        ];

        $breadcrumbs['last'] = $dateData->month->nameFullSimple;

        return $breadcrumbs;

    }

}

