<?php

namespace common\componentsV2\elements;

use Yii;
use yii\web\NotFoundHttpException;


class ElementsUrls
{

    public $ids;
    public $keys;

    function __construct()
    {
        $this->ids = $this->ids();
        $this->keys = $this->keys();
    }

    private function ids(){

        $ids[1] = 'water';
        $ids[2] = 'earth';
        $ids[3] = 'fire';
        $ids[4] = 'air';
        return $ids;
    }

    private function keys(){

        $keys['water'] = 1;
        $keys['earth'] = 2;
        $keys['fire'] = 3;
        $keys['air'] = 4;
        return $keys;
    }

}

