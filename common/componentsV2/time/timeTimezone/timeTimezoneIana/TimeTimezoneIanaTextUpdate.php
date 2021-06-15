<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIana;

use common\componentsV2\time\TimeUpdateTime;
use Yii;
class TimeTimezoneIanaTextUpdate
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
         * {time-zone-name} {time-zone-utc}
         */
        Yii::$app->params['text']['title'] = str_replace('{time-zone-name}', $this->data->data['zone_name'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{time-zone-name}', $this->data->data['zone_name'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{time-zone-name}', $this->data->data['zone_name'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{time-zone-utc}', $this->data->offset, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{time-zone-name}', $this->data->data['zone_name'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{time-zone-utc}', $this->data->offset, Yii::$app->params['text']['text1']);

    }
}
