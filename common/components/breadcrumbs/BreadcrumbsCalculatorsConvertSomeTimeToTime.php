<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalculatorsConvertSomeTimeToTime
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($calculators)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'calculators',
            'text' => Yii::t('app', 'Calculators'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calculators/names/' . $calculators->current->calculator->calculator['url'],
            'text' => $calculators->current->calculator->calculator['name'],
        ];




        $breadcrumbs['last'] = Yii::$app->params['text']['h1'];


        return $breadcrumbs;

    }

}

