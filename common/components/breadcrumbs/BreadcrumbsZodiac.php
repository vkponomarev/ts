<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsZodiac
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs()
    {

        $count = 0;

        $breadcrumbs['last'] = Yii::t('app', 'Zodiac signs');

        return $breadcrumbs;

    }

}

