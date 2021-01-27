<?php

namespace common\components\moon;

class MoonPhasesArray
{

    public function phases()
    {

        $phases['new-moon'] = 1;
        $phases['waxing-moon'] = 1;
        $phases['full-moon'] = 1;
        $phases['waning-moon'] = 1;

        return $phases;

    }
}

