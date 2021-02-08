<?php

namespace common\componentsV2\planets;

use Yii;
use yii\web\NotFoundHttpException;


class Planets
{

    /**
     * @var \common\componentsV2\planets\PlanetsUrls
     */
    public $urls;
    /**
     * @var \common\componentsV2\planets\PlanetsTexts
     */
    public $texts;

    function __construct()
    {
        $this->urls();
        $this->texts();
    }

    function urls(){
        $this->urls = (new PlanetsUrls());
        return $this;
    }

    function texts(){
        $this->texts = (new PlanetsTexts());
        return $this;
    }


}

