<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsNamazCitiesCity
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($time)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'time',
            'text' => Yii::t('app', 'Time'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'namaz',
            'text' => Yii::t('app', 'Namaz time'),
        ];

        $breadcrumbs['last'] = $time->location->city->name;


        return $breadcrumbs;

    }

}

