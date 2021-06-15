<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsTimeContinentsContinent
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($continentName)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'time',
            'text' => Yii::t('app', 'Time'),
        ];

        $breadcrumbs['last'] = $continentName;

        return $breadcrumbs;

    }

}

