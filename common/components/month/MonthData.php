<?php

namespace common\components\year;

class MonthData
{

    public function data($month)
    {
        $yearFull = date('Y');
        $yearShort = date('y');

        if ($year)
            return [
                'full' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
                'short' => str_pad($yearShort, 2, '0', STR_PAD_LEFT),
                'current' => str_pad($year, 4, '0', STR_PAD_LEFT),
                'previous' => str_pad($year - 1, 4, '0', STR_PAD_LEFT),
                'next' => str_pad($year + 1, 4, '0', STR_PAD_LEFT)
            ];
        else
            return [
                'full' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
                'short' => str_pad($yearShort, 2, '0', STR_PAD_LEFT),
                'current' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
                'previous' => str_pad($yearFull - 1, 4, '0', STR_PAD_LEFT),
                'next' => str_pad($yearFull + 1, 4, '0', STR_PAD_LEFT)
            ];


    }

}

