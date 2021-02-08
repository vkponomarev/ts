<?php

namespace common\componentsV2\elements;

use Yii;
use yii\web\NotFoundHttpException;


class Elements
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

