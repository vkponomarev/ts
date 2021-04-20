<?php

namespace common\componentsV2\time;

use Yii;


class TimeTimeZoneTextUpdate
{

    /**
     * TimeTimeZoneTextUpdate constructor.
     * @param $timeZone \common\componentsV2\time\TimeTimeZone
     */
    public function __construct($timeZone)
    {
        $this->timeZone($timeZone);
    }

    /**
     * @param $timeZone \common\componentsV2\time\TimeTimeZone
     */
    private function timeZone($timeZone)
    {

        if ($timeZone->current['offset_hours'] >=0){
            $timeZone->current['offset_hours'] = '+' . $timeZone->current['offset_hours'];
        }

        /**
         * {time-zone-abbr} {time-zone-name} {time-zone-utc}
         */
        Yii::$app->params['text']['title'] = str_replace('{time-zone-abbr}', $timeZone->current['abbreviation'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{time-zone-name}', $timeZone->current['name'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{time-zone-abbr}', $timeZone->current['abbreviation'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{time-zone-name}', $timeZone->current['name'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{time-zone-abbr}', $timeZone->current['abbreviation'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{time-zone-name}', $timeZone->current['name'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{time-zone-utc}', $timeZone->current['offset_hours'], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{time-zone-abbr}', $timeZone->current['abbreviation'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{time-zone-name}', $timeZone->current['name'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{time-zone-utc}', $timeZone->current['offset_hours'], Yii::$app->params['text']['text1']);
        }
}

