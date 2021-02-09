<?php

namespace common\componentsV2\fasts;

use Yii;
use yii\web\NotFoundHttpException;


class FastsDates
{

    public $threeSteps;
    public $sixSteps;

    function __construct()
    {
        $this->ids = $this->ids();
        $this->keys = $this->keys();
    }

    /**
     * 1- Строгий пост запрещено мясо рыба яйца молочное
     * 2- нестрогий пост - нельзя мясо, яйца, молочное, можно рыбу
     */

    private function threeSteps(){

        $threeSteps[2021-01-01] = 1;
        $threeSteps[2021-01-02] = 2;
        $threeSteps[2021-01-03] = 2;
        $threeSteps[2021-01-04] = 2;
        $threeSteps[2021-01-05] = 2;
        $threeSteps[2021-01-06] = 1;
        $threeSteps[2021-01-18] = 1;
        $threeSteps[2021-01-20] = 2;
        $threeSteps[2021-01-22] = 2;
        $threeSteps[2021-01-27] = 2;
        $threeSteps[2021-01-29] = 2;

        return $threeSteps;
    }

    private function sixSteps(){

        $threeSteps[2021-01-01] = 1;
        $threeSteps[2021-01-02] = 2;
        $threeSteps[2021-01-03] = 2;
        $threeSteps[2021-01-04] = 2;
        $threeSteps[2021-01-05] = 2;
        $threeSteps[2021-01-06] = 1;
        $threeSteps[2021-01-18] = 1;
        $threeSteps[2021-01-20] = 2;
        $threeSteps[2021-01-22] = 2;
        $threeSteps[2021-01-27] = 2;
        $threeSteps[2021-01-29] = 2;

        return $threeSteps;
    }

}

