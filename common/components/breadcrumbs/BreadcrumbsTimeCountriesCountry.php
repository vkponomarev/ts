<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsTimeCountriesCountry
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

        /*$breadcrumbs['urls'][++$count] =  [
            'url' => 'time/countries/' . $time->location->continent->url,
            'text' => $time->location->continent->name,
        ];*/

        $breadcrumbs['last'] = $time->location->country->name;






        return $breadcrumbs;

    }

}

