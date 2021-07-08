<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalculatorsNamesDate
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs()
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'calculators',
            'text' => Yii::t('app', 'Calculators'),
        ];

        $breadcrumbs['last'] = Yii::$app->params['text']['h1'];


        return $breadcrumbs;

    }

}

