<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckHolidaysDays
{


    function check($dayNameURL, $dayURL, $countryURL, $holidaysRange)
    {


        if ($dayURL == '' && $dayNameURL == '') {
            throw new NotFoundHttpException('404');
        }

        if ($dayURL <> ''){

            if ($countryURL <> ''){
                throw new NotFoundHttpException('404');
            }

            $split = array();

            if (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $dayURL, $split)) {

                if (!checkdate($split[2], $split[3], $split[1]))
                    throw new NotFoundHttpException('404');

            } else {

                throw new NotFoundHttpException('404');

            }

            if ($split[1] < $holidaysRange['start'] or $split[1] > $holidaysRange['end'])
                throw new NotFoundHttpException('404');

            return [
                'year' => $split[1],
                'month' => $split[2],
                'day' => $split[3],
                'date' => $dayURL,
            ];

        }

        if ($dayNameURL <> 'today' && $countryURL <> ''){
            throw new NotFoundHttpException('404');
        }

        if ($dayNameURL == 'today'){
            $date = (new \DateTime())->format('Y-m-d');
        }
        if ($dayNameURL == 'yesterday'){
            $date = (new \DateTime())->modify('-1 day')->format('Y-m-d');
        }
        if ($dayNameURL == 'tomorrow'){
            $date = (new \DateTime())->modify('+1 day')->format('Y-m-d');
        }

        return [
            'year' => 0,
            'month' => 0,
            'day' => 0,
            'date' => $date,
        ];
    }

}
