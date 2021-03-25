<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsZodiacMonths
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData)
    {

        $count = 0;


        $breadcrumbs['urls'][$count] =  [
            'url' => 'zodiac',
            'text' => Yii::t('app', 'Zodiac signs'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/zodiac/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Calendar'),
        ];


        $breadcrumbs['last'] = $dateData->month->nameFullSimple;

        return $breadcrumbs;

    }

}

