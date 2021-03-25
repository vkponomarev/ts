<?php

namespace common\components\breadcrumbs;

use phpDocumentor\Reflection\TypeResolver;
use Yii;

class BreadcrumbsCalendarYears
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $countryURL, $countryData)
    {

        $count = 0;
        if ($countryURL){
            $breadcrumbs['urls'][$count] = [
                'url' => 'calendar/years/' . $dateData->year->current,
                'text' => Yii::t('app', 'Calendar'),
            ];

            $breadcrumbs['last'] = $countryData['name'];

        } else {

            $breadcrumbs['last'] = Yii::t('app', 'Calendar');

        }

        return $breadcrumbs;

    }

}

