<?php

namespace common\componentsV2\colors;

use Yii;
use yii\web\NotFoundHttpException;


class Colors
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
        $this->urls = (new ColorsUrls());
        return $this;
    }

    function texts(){
        $this->texts = (new ColorsTexts());
        return $this;
    }


}

