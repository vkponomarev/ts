<?php

namespace common\components\customize;

class CustomizeParams

{

    public function params($type, $orientation, $design)
    {
        $params = array();

        if (($type == 1) && ($orientation == 'P') && ($design == 1)) {
            $params = [
                'page' => 'calendar-yearly-portrait-one',
            ];
        }

        if (($type == 1) && ($orientation == 'L') && ($design == 1)) {
            $params = [
                'page' => 'calendar-yearly-landscape-one',
            ];
        }


        if (($type == 2) && ($orientation == 'P') && ($design == 1)) {
            $params = [
                'page' => 'calendar-monthly-portrait-one',
            ];
        }

        if (($type == 2) && ($orientation == 'L') && ($design == 1)) {
            $params = [
                'page' => 'calendar-monthly-landscape-one',
            ];
        }


        if (($type == 3) && ($orientation == 'P') && ($design == 1)) {
            $params = [
                'page' => 'calendar-2monthly-portrait-one',
            ];
        }

        if (($type == 3) && ($orientation == 'L') && ($design == 1)) {
            $params = [
                'page' => 'calendar-2monthly-landscape-one',
            ];
        }

        if (($type == 4) && ($orientation == 'L') && ($design == 1)) {
            $params = [
                'page' => 'calendar-weekly-landscape-one',
            ];
        }

        if (($type == 4) && ($orientation == 'P') && ($design == 1)) {
            $params = [
                'page' => 'calendar-weekly-portrait-one',
            ];
        }

        if (($type == 5) && ($orientation == 'L') && ($design == 1)) {
            $params = [
                'page' => 'calendar-daily-landscape-one',
            ];
        }

        if (($type == 5) && ($orientation == 'P') && ($design == 1)) {
            $params = [
                'page' => 'calendar-daily-portrait-one',
            ];
        }

        return $params;

    }

}