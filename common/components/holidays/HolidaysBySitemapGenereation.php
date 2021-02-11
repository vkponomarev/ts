<?php

namespace common\components\holidays;

use Yii;

class HolidaysBySitemapGenereation
{

    /**
     * @param $date \common\componentsV2\date\Date
     * @param $languageID
     * @param $countryID
     * @return array
     * @throws \yii\db\Exception
     */
    public function holidays()
    {

        $holidays = Yii::$app->db
            ->createCommand('
            select
            h.url,
            h.id
            from
            holidays as h
            ')
            ->queryAll();

        return $holidays;


    }

}

