<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviation;

use common\componentsV2\time\TimeUpdateTime;
use Yii;
class TimeTimezoneAbbreviationTextUpdate
{

    public $data;
    /**
     * TimeCityUpdateText constructor.
     * @param $geoNameData \common\componentsV2\time\timeLocation\timeLocationCity\TimeLocationCityDate
     */
    public function __construct($data, $params)
    {
        $this->data = $data;
        $plusTime = 0;
        if (isset($params['timezone']['abbreviationTime']) && $params['timezone']['abbreviationTime']) {
            $plusTime = $params['timezone']['abbreviationTime'];
        }
        /**
         * {time-zone-abbr} {time-zone-name} {time-zone-utc} {time-zone-plus-time}
         */
        Yii::$app->params['text']['title'] = str_replace('{time-zone-abbr}', $this->data->data['abbreviation'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{time-zone-name}', $this->data->data['name'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{time-zone-abbr}', $this->data->data['abbreviation'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{time-zone-name}', $this->data->data['name'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{time-zone-abbr}', $this->data->data['abbreviation'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{time-zone-name}', $this->data->data['name'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{time-zone-utc}', $this->data->offset, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{time-zone-abbr}', $this->data->data['abbreviation'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{time-zone-name}', $this->data->data['name'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{time-zone-utc}', $this->data->offset, Yii::$app->params['text']['text1']);

    }
}
