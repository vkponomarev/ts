<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsZodiacSigns
{
    /**
     * @param $zodiacs \common\componentsV2\zodiacs\Zodiacs
     * @return mixed
     */
    public function breadcrumbs($zodiacs)
    {

        $count = 0;


        $breadcrumbs['urls'][$count] =  [
            'url' => 'zodiac',
            'text' => Yii::t('app', 'Zodiac signs'),
        ];

        $breadcrumbs['last'] = $zodiacs->zodiac->name;

        return $breadcrumbs;

    }

}

