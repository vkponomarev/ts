<?php

namespace common\components\moon;

class MoonPictures
{

    public function pictures($weekDay, $calendar)
    {

        $moonPhase = $weekDay['moonPhase']['phase'];

        if (isset($calendar['newMoon'][$weekDay['date']])){

            $img = 'moon-0-1.png';
            return $img;
        }

        if (isset($calendar['moonFirstQuarter'][$weekDay['date']])){

            $img = 'moon-0-5.png';
            return $img;
        }


        if (isset($calendar['fullMoon'][$weekDay['date']])){

            $img = 'moon-1-0.png';
            return $img;
        }

        if (isset($calendar['moonThirdQuarter'][$weekDay['date']])){

            $img = 'moon-1-4.png';
            return $img;
        }




        /*if (($moonPhase >= 0.98 && $moonPhase <= 1) or ($moonPhase >= 0 && $moonPhase <= 0.02)){
            $img = 'moon-0-1.png';
        }*/
        if ($moonPhase >= 0.00 && $moonPhase <0.09){
            $img = 'moon-0-2.png';
        }
        if ($moonPhase >= 0.09 && $moonPhase <0.16){
            $img = 'moon-0-3.png';
        }
        if ($moonPhase >= 0.16 && $moonPhase <0.25){
            $img = 'moon-0-4.png';
        }
        /*if ($moonPhase >= 0.23 && $moonPhase <0.27){
            $img = 'moon-0-5.png';
        }*/
        if ($moonPhase >= 0.25 && $moonPhase <0.32){
            $img = 'moon-0-6.png';
        }
        if ($moonPhase >= 0.32 && $moonPhase <0.40){
            $img = 'moon-0-7.png';
        }
        if ($moonPhase >= 0.40 && $moonPhase <0.48){
            $img = 'moon-0-8.png';
        }
        /*if ($moonPhase >= 0.48 && $moonPhase <0.52){
            $img = 'moon-1-0.png';
        }*/
        if ($moonPhase >= 0.48 && $moonPhase < 0.60){
            $img = 'moon-1-1.png';
        }
        if ($moonPhase >= 0.60 && $moonPhase < 0.68){
            $img = 'moon-1-2.png';
        }
        if ($moonPhase >= 0.68 && $moonPhase < 0.73){
            $img = 'moon-1-3.png';
        }
        /*if ($moonPhase >= 0.73 && $moonPhase < 0.78){
            $img = 'moon-1-4.png';
        }*/
        if ($moonPhase >= 0.73 && $moonPhase < 0.83){
            $img = 'moon-1-5.png';
        }
        if ($moonPhase >= 0.83 && $moonPhase < 0.88){
            $img = 'moon-1-6.png';
        }

        if ($moonPhase >= 0.88 && $moonPhase < 1){
            $img = 'moon-1-7.png';
        }

        return $img;

    }/*
0	New Moon
Waxing Crescent
0.25	First Quarter
Waxing Gibbous
0.5	Full Moon
Waning Gibbous
0.75	Last Quarter
Waning Crescent*/
}

