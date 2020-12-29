<?php

namespace common\components\getParams;

use Yii;
use yii\web\NotFoundHttpException;


class GetParamsByCalendarSeasons

{

    public function params($country, $year, $holidaysRange)
    {

        if ($country['url'] <> '') {

            if ($year < $holidaysRange['start'] or $year > $holidaysRange['end'])
                throw new NotFoundHttpException('404');

        } else {

            $country['id'] = $country['defaultID'];

        }

        return $country;

    }

}