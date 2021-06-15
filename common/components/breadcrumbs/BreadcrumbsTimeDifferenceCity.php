<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsTimeDifferenceCity
{
    /**
     * @param $time \common\componentsV2\time\Time
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

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'time/countries/' . $time->location->country->url,
            'text' => $time->location->country->name,
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'time/cities/' . $time->location->city->url,
            'text' => $time->location->city->name,
        ];

        $breadcrumbs['last'] = Yii::$app->params['text']['h1'];

        return $breadcrumbs;

    }

}

