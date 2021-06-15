<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsTime
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs()
    {

        $count = 0;

        $breadcrumbs['last'] = Yii::t('app', 'Time');


        return $breadcrumbs;

    }

}

