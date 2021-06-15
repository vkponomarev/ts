<?php

namespace common\componentsV2\time\timeLocation\timeLocationCity;

use common\componentsV2\time\TimeUpdateTime;

class TimeLocationCityDate
{

    public $date;
    public $offset;
    public $offsetSimple;
    public $cityData;

    /**
     * TimeCityDate constructor.
     * @param $geoNameData \common\componentsV2\time\timeLocation\timeLocationCity\TimeLocationCityByGeoNameID
     * @throws \Exception
     */
    public function __construct($geoNameData)
    {
        $this->cityData = $geoNameData->data;

        //\Yii::$app->timeZone = $this->cityData['timezone'];
        $this->date = (new \DateTime())->setTimezone(new \DateTimeZone($this->cityData['timezone']));

        //\Yii::$app->timeZone = $this->cityData['timezone'];
        //(new \common\components\dump\Dump())->printR(\Yii::$app->timeZone);
        //(new \common\components\dump\Dump())->printR($this->date);
        //(new \common\components\dump\Dump())->printR(\Yii::$app->formatter->asDate($this->date, 'long') );die;

        $this->offset = $this->date->format('P');
        $this->offsetSimple = $this->date->format('O');
    }
}
