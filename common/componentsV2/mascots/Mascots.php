<?php

namespace common\componentsV2\mascots;

use Yii;
use yii\web\NotFoundHttpException;


class Mascots
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
        $this->urls = (new MascotsUrls());
        return $this;
    }

    function texts(){
        $this->texts = (new MascotsTexts());
        return $this;
    }


}

