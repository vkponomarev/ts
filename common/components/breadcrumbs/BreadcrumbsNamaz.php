<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsNamaz
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs()
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'time',
            'text' => Yii::t('app', 'Time'),
        ];

        $breadcrumbs['last'] = Yii::t('app', 'Namaz time');


        return $breadcrumbs;

    }

}

