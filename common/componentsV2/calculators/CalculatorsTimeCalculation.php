<?php

namespace common\componentsV2\calculators;


class CalculatorsTimeCalculation
{

    public $active;
    public $result;
    public $calculation;
    public $valueOne;
    public $valueTwo;
    public $timeMethod;
    public $calculationSecondDevisionByZero;
    private $secondsOne;
    private $secondsTwo;
    private $timeStampOne;
    private $timeStampTwo;

    function __construct()
    {
        $this->active = 0;
        $this->result = 0;
        $this->valueOne = 0;
        $this->calculationSecondSign = 0;
        $this->timeMethod = '';

        $this->calculationSecondMinutes = 0;
        $this->calculationSecondHours = 0;
        $this->calculationSecondMinutes = 0;
        $this->calculationSecondSeconds = 0;

        if (\Yii::$app->request->get('time-one')) {
            $this->timeOne = new \DateTime('2020-10-20 ' . \Yii::$app->request->get('time-one'));
            $this->timeTwo = new \DateTime('2020-10-20 ' . \Yii::$app->request->get('time-two'));
            $this->secondsOne = ((int)$this->timeOne->format('H') * 60 * 60) + ((int)$this->timeOne->format('i') * 60) + ((int)$this->timeOne->format('s'));
            $this->secondsTwo = ((int)$this->timeTwo->format('H') * 60 * 60) + ((int)$this->timeTwo->format('i') * 60) + ((int)$this->timeTwo->format('s'));

            $this->timeStampOne =
                strtotime(
                    $this->valueOne =
                        \Yii::$app->request->get('time-one')
                );
            $this->timeStampTwo =
                strtotime(
                    $this->valueTwo =
                        \Yii::$app->request->get('time-two'));


            $this->timeMethod = \Yii::$app->request->get('time-method');

            if (\Yii::$app->request->get('time-method') == 'addition') {

                ($this->calculation = new \DateTime())->setTimestamp($this->timeStampOne + $this->timeStampTwo);
                $this->calculationSecond = $this->secondsOne + $this->secondsTwo;

                $this->calculationSecondMinutes = floor($this->calculationSecond / 60);
                $this->calculationSecondHours = floor($this->calculationSecondMinutes / 60);
                $this->calculationSecondMinutes = $this->calculationSecondMinutes - ($this->calculationSecondHours * 60);
                $this->calculationSecondSeconds = $this->calculationSecond - (($this->calculationSecondHours * 60 * 60) + ($this->calculationSecondMinutes * 60));

                //(new \common\components\dump\Dump())->printR('Часы = ' . $this->calculationSecondHours);
                //(new \common\components\dump\Dump())->printR('минуты = ' . $this->calculationSecondMinutes);
                //(new \common\components\dump\Dump())->printR('секунды = ' . $this->calculationSecondSeconds);
            }

            if (\Yii::$app->request->get('time-method') == 'subtraction') {
                ($this->calculation = new \DateTime())->setTimestamp($this->timeStampOne - $this->timeStampTwo);
                $this->calculationSecond = $this->secondsOne - $this->secondsTwo;

                if ($this->calculationSecond < 0){
                    $this->calculationSecondSign = '-';
                    $this->calculationSecond = abs($this->calculationSecond);
                }
                //(new \common\components\dump\Dump())->printR('Секунды' . $this->calculationSecond);

                $this->calculationSecondMinutes = floor($this->calculationSecond / 60);
                $this->calculationSecondHours = floor($this->calculationSecondMinutes / 60);
                $this->calculationSecondMinutes = $this->calculationSecondMinutes - ($this->calculationSecondHours * 60);
                $this->calculationSecondSeconds = $this->calculationSecond - (($this->calculationSecondHours * 60 * 60) + ($this->calculationSecondMinutes * 60));

                //(new \common\components\dump\Dump())->printR('Часы = ' . $this->calculationSecondHours);
                //(new \common\components\dump\Dump())->printR('минуты = ' . $this->calculationSecondMinutes);
                //(new \common\components\dump\Dump())->printR('секунды = ' . $this->calculationSecondSeconds);

            }

            if (\Yii::$app->request->get('time-method') == 'multiplication') {
                ($this->calculation = new \DateTime())->setTimestamp($this->timeStampOne * $this->timeStampTwo);

                $this->calculationSecond = $this->secondsOne * $this->secondsTwo;

                //(new \common\components\dump\Dump())->printR('Секунды' . $this->calculationSecond);

                $this->calculationSecondMinutes = floor($this->calculationSecond / 60);
                $this->calculationSecondHours = floor($this->calculationSecondMinutes / 60);
                $this->calculationSecondMinutes = $this->calculationSecondMinutes - ($this->calculationSecondHours * 60);
                $this->calculationSecondSeconds = $this->calculationSecond - (($this->calculationSecondHours * 60 * 60) + ($this->calculationSecondMinutes * 60));

                //(new \common\components\dump\Dump())->printR('Часы = ' . $this->calculationSecondHours);
                //(new \common\components\dump\Dump())->printR('минуты = ' . $this->calculationSecondMinutes);
                //(new \common\components\dump\Dump())->printR('секунды = ' . $this->calculationSecondSeconds);

            }

            if (\Yii::$app->request->get('time-method') == 'division') {
                ($this->calculation = new \DateTime())->setTimestamp($this->timeStampOne / $this->timeStampTwo);
                if ($this->secondsTwo == 0){
                    $this->calculationSecondDevisionByZero = 1;
                } else {
                    $this->calculationSecond = $this->secondsOne / $this->secondsTwo;

                    //(new \common\components\dump\Dump())->printR('Секунды' . $this->calculationSecond);

                    $this->calculationSecondMinutes = floor($this->calculationSecond / 60);
                    $this->calculationSecondHours = floor($this->calculationSecondMinutes / 60);
                    $this->calculationSecondMinutes = $this->calculationSecondMinutes - ($this->calculationSecondHours * 60);
                    $this->calculationSecondSeconds = $this->calculationSecond - (($this->calculationSecondHours * 60 * 60) + ($this->calculationSecondMinutes * 60));


                }

            }

            $this->result = 1;
        }
    }
}

