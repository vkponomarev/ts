<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviation;

use common\componentsV2\time\TimeUpdateTime;
use Yii;
class TimeTimezoneAbbreviationTimeTextUpdate
{

    public $data;
    /**
     * TimeCityUpdateText constructor.
     * @param $geoNameData \common\componentsV2\time\timeLocation\timeLocationCity\TimeLocationCityDate
     */
    public function __construct($data)
    {
        $this->data = $data;
        /**
         * {time-zone-name} {time-zone-plus-time}
         */
        Yii::$app->params['text']['title'] = str_replace('{time-zone-plus-time}', $this->data->timeOffset, Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{time-zone-plus-time}', $this->data->timeOffset, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{time-zone-plus-time}', $this->data->timeOffset, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{time-zone-plus-time}', $this->data->timeOffset, Yii::$app->params['text']['text1']);

    }
}
