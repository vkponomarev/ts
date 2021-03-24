<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarWeeksYears
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData)
    {

        $count = 0;

        $breadcrumbs['last'] = $dateData->year->current;

        return $breadcrumbs;

    }

}

