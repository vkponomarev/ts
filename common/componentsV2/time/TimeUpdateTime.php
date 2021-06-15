<?php

namespace common\componentsV2\time;

use Yii;
use yii\web\NotFoundHttpException;


class TimeUpdateTime
{

    public $data;

    public function __construct($data)
    {
        foreach ($data->data as $key => $item){
            $data->data[$key]['date'] = (
            new \DateTime())->setTimeZone(
                    new \DateTimeZone($item['timezone']));
        }
        $this->data = $data->data;
    }
}
