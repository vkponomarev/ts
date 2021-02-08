<?php

namespace common\componentsV2\colors;

use Yii;
use yii\web\NotFoundHttpException;


class ColorsUrls
{

    public $ids;
    public $keys;

    function __construct()
    {
        $this->ids = $this->ids();
        $this->keys = $this->keys();
    }

    private function ids(){

        $ids[1] = 'maroon';
        $ids[2] = 'purple';
        $ids[3] = 'crimson';
        $ids[4] = 'red';
        $ids[5] = 'orange';
        $ids[6] = 'yellow';
        $ids[7] = 'blue';
        $ids[8] = 'green';
        $ids[9] = 'pink';
        $ids[10] = 'golden';
        $ids[11] = 'golden-beige';
        $ids[12] = 'blue';
        $ids[13] = 'pastel-colors';
        $ids[14] = 'bright-blue';
        $ids[15] = 'shades-of-burgundy-and-red';
        $ids[16] = 'gray';
        $ids[17] = 'black';
        $ids[18] = 'dark-green';
        $ids[19] = 'brown';
        $ids[20] = 'silver';
        $ids[21] = 'white';


        return $ids;
    }

    private function keys(){

        $keys['maroon'] = 1;
        $keys['purple'] = 2;
        $keys['crimson'] = 3;
        $keys['red'] = 4;
        $keys['orange'] = 5;
        $keys['yellow'] = 6;
        $keys['blue'] = 7;
        $keys['green'] = 8;
        $keys['pink'] = 9;
        $keys['golden'] = 10;
        $keys['golden-beige'] = 11;
        $keys['blue'] = 12;
        $keys['pastel-colors'] = 13;
        $keys['bright-blue'] = 14;
        $keys['shades-of-burgundy-and-red'] = 15;
        $keys['gray'] = 16;
        $keys['black'] = 17;
        $keys['dark-green'] = 18;
        $keys['brown'] = 19;
        $keys['silver'] = 20;
        $keys['white'] = 21;

        return $keys;
    }


}

