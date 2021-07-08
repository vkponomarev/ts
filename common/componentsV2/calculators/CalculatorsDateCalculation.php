<?php

namespace common\componentsV2\calculators;


use common\componentsV2\time\timeDifference\TimeDifference;
use common\componentsV2\time\timeGeoIP\TimeGeoIP;
use common\componentsV2\time\timeLocation\TimeLocation;
use common\componentsV2\time\timeTimezone\TimeTimezone;

class CalculatorsDateCalculation
{

    public $active;
    public $result;
    private $timeOne;
    private $timeTwo;

    function __construct()
    {

        $this->active = 0;
        $this->result = 0;


        if (\Yii::$app->request->get('picker1')) {


            $this->dateOne = new \DateTime(\Yii::$app->request->get('picker1'));
            $this->dateTwo = new \DateTime(\Yii::$app->request->get('picker2'));

            $this->dateDiff = $this->dateOne->diff($this->dateTwo);
            //(new \common\components\dump\Dump())->printR($this->dateOne);
            //(new \common\components\dump\Dump())->printR($this->dateTwo);
            //(new \common\components\dump\Dump())->printR($dateDiff);
            //(new \common\components\dump\Dump())->printR($this->dateDiff->format('%y Year %m Month %d Day %h Hours %i Minute %s Seconds'));

            $this->result = 1;

        }
    }

}

