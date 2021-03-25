<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsHolidaysYears
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $countryURL, $countryData)
    {

        $count = 0;


        if ($countryURL){


            $breadcrumbs['urls'][$count] =  [
                'url' => 'holidays/years/' . $dateData->year->current,
                'text' => Yii::t('app', 'Holidays'),
            ];

            $breadcrumbs['last'] = $countryData['name'];
        } else {

            $breadcrumbs['last'] = Yii::t('app', 'Holidays');
        }



        return $breadcrumbs;

    }

}

