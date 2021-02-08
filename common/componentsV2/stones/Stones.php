<?php

namespace common\componentsV2\stones;

use Yii;
use yii\web\NotFoundHttpException;


class Stones
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
        $this->urls = (new StonesUrls());
        return $this;
    }

    function texts(){
        $this->texts = (new StonesTexts());
        return $this;
    }


}

