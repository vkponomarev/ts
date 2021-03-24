<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsZodiacYears
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

        $breadcrumbs['last'] = $dateData->year->current;

        return $breadcrumbs;

    }

}

