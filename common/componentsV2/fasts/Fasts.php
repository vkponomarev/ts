<?php

namespace common\componentsV2\fasts;

use Yii;
use yii\web\NotFoundHttpException;


class Fasts
{

    /**
     * @var \common\componentsV2\elements\ElementsUrls
     */
    public $urls;
    /**
     * @var \common\componentsV2\elements\ElementsUrls
     */
    public $texts;

    function __construct()
    {
        $this->urls();
        $this->texts();
    }

    function urls(){
        $this->urls = (new ElementsUrls());
        return $this;
    }

    function texts(){
        $this->texts = (new ElementsTexts());
        return $this;
    }


}

