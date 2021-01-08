<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;

/**
 * Класс для проверки URL на возможность существоания
 * Class UrlCheckWeek
 * @package common\components\urlCheck
 */
class UrlCheckWeek
{

    /**
     * Проверяем URL если не прошло проверку выдаем 404 страницу
     * @param $year integer
     * @param $week integer Двузначное число с нулем впереди если например 06, 17
     * @return array {foo: string, bar: int}
     * @throws \yii\web\NotFoundHttpException
     */
    function check($year, $week)
    {

        if (!preg_match("/^[0-9]{2}$/", $week)) {

            throw new NotFoundHttpException('404');

        }

        $date = new \DateTime($year . '-12-31');
        $lastWeek = $date->format('W');

        if ($lastWeek == '01'){
            $date->modify('-6 days');
            $lastWeek = $date->format('W');
        }

        if ($week < 1 or $week > $lastWeek) {

            throw new NotFoundHttpException('404');

        }

        return [
            'url' => $week,
            'simple' => (int)$week,
            ];

    }

}
