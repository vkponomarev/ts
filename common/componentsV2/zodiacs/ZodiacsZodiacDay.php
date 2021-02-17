<?php

namespace common\componentsV2\zodiacs;

/**
 * Какой знак зодиака по дате дня
 * Class ZodiacsZodiac
 * @package common\componentsV2\zodiacs
 */
class ZodiacsZodiacDay
{

    public $url;

    /**
     * ZodiacsZodiacDay constructor.
     * @param $day
     * @param $zodiacURL \common\componentsV2\zodiacs\ZodiacsUrls
     */
    function __construct($day, $zodiacURL)
    {
        $zodiacID = $this->zodiacByDay($day);
        $this->url = $zodiacURL->ids[$zodiacID];
    }

    private function zodiacByDay($day)
    {
        $ranges = $this->ranges();

        foreach ($ranges as $zodiacIDs => $range) {

            if ($day >= $range['start'] && $day <= $range['end']) {

                $zodiacID = $zodiacIDs;

            }
        }
        if (!isset($zodiacID)){
            $zodiacID = 10;
        }
        return $zodiacID;
    }

    private function ranges()
    {

        $range[1] = [
            'start' => '2021-03-21',
            'end' => '2021-04-20',
        ];
        $range[2] = [
            'start' => '2021-04-21',
            'end' => '2021-05-21',
        ];
        $range[3] = [
            'start' => '2021-05-22',
            'end' => '2021-06-21',
        ];
        $range[4] = [
            'start' => '2021-06-22',
            'end' => '2021-07-22',
        ];
        $range[5] = [
            'start' => '2021-07-23',
            'end' => '2021-08-21',
        ];
        $range[6] = [
            'start' => '2021-08-22',
            'end' => '2021-09-23',
        ];
        $range[7] = [
            'start' => '2021-09-24',
            'end' => '2021-10-23',
        ];
        $range[8] = [
            'start' => '2021-10-24',
            'end' => '2021-11-22',
        ];
        $range[9] = [
            'start' => '2021-11-23',
            'end' => '2021-12-22',
        ];
        $range[10] = [
            'start' => '2021-12-23',
            'end' => '2022-01-20',
        ];
        $range[11] = [
            'start' => '2021-01-21',
            'end' => '2021-02-19',
        ];
        $range[12] = [
            'start' => '2021-02-20',
            'end' => '2021-03-20',
        ];


        return $range;
    }

}

