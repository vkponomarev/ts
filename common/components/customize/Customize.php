<?php

namespace common\components\customize;

class Customize
{

    function __construct()
    {

    }

    function params($type, $orientation, $design)
    {

        return (new CustomizeParams())->params($type, $orientation, $design);

    }

}

