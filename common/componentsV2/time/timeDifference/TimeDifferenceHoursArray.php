<?php

namespace common\componentsV2\time\timeDifference;

use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesByPopulation;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesDateUpdate;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesDifferenceSort;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesDifferenceUpdate;

class TimeDifferenceHoursArray
{

    public $array;

    public function __construct()
    {

         $this->array = [
             '-12',
             '-11',
             '-10',
             '-9.30',
             '-9',
             '-8',
             '-7',
             '-6',
             '-5',
             '-4',
             '-3.45',
             '-3.30',
             '-3',
             '-2',
             '-1',
             '0',
             '1',
             '2',
             '3',
             '3.30',
             '4',
             '4.30',
             '5',
             '5.30',
             '5.45',
             '6',
             '6.30',
             '7',
             '8',
             '8.45',
             '9',
             '9.45',
             '10',
             '10.30',
             '10.50',
             '11',
             '12',
             '12.45',
             '12.50',
             '13',
             '14'
         ];

    }
}
