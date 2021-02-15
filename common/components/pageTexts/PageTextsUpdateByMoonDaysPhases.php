<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByMoonDaysPhases

{
    /**
     * @param $dayName
     * @param $date \common\componentsV2\date\Date
     * @param $phase
     * @throws \yii\base\InvalidConfigException
     */
    public function update($dayName, $date, $phase)
    {
        /*
        0	New Moon
        Waxing Crescent
        0.25	First Quarter
        Waxing Gibbous
        0.5	Full Moon
        Waning Gibbous
        0.75	Last Quarter
        Waning Crescent*/

        if ($phase >= 0.00 && $phase < 0.02) {
            $phaseOutput = Yii::t('app', 'New moon');
        }
        if ($phase >= 0.02 && $phase < 0.16) {
            $phaseOutput = Yii::t('app', 'Waxing crescent');
        }
        if ($phase >= 0.16 && $phase < 0.25) {
            $phaseOutput = Yii::t('app', 'Waxing crescent');
        }

        if ($phase >= 0.25 && $phase < 0.32) {
            $phaseOutput = Yii::t('app', 'Moon first quarter');
        }
        if ($phase >= 0.32 && $phase < 0.40) {
            $phaseOutput = Yii::t('app', 'Growing moon');
        }
        if ($phase >= 0.40 && $phase < 0.48) {
            $phaseOutput = Yii::t('app', 'Growing moon');
        }

        if ($phase >= 0.48 && $phase < 0.52) {
            $phaseOutput = Yii::t('app', 'Full moon');
        }
        if ($phase >= 0.52 && $phase < 0.68) {
            $phaseOutput = Yii::t('app', 'Waning moon');
        }
        if ($phase >= 0.68 && $phase < 0.73) {
            $phaseOutput = Yii::t('app', 'Waning moon');
        }

        if ($phase >= 0.73 && $phase < 0.83) {
            $phaseOutput = Yii::t('app', 'Moon third quarter');
        }
        if ($phase >= 0.83 && $phase < 0.98) {
            $phaseOutput = Yii::t('app', 'Waning crescent');
        }

        if ($phase >= 0.98 && $phase < 1) {
            $phaseOutput = Yii::t('app', 'New moon');
        }

        $dateOutput = Yii::$app->formatter->asDate($date->current, 'd MMMM y');

        Yii::$app->params['text']['title'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{moon-phase}', $phaseOutput, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{moon-phase}', $phaseOutput, Yii::$app->params['text']['text1']);

    }

}