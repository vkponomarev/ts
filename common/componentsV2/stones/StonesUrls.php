<?php

namespace common\componentsV2\stones;

use Yii;
use yii\web\NotFoundHttpException;


class StonesUrls
{

    public $ids;
    public $keys;

    function __construct()
    {
        $this->ids = $this->ids();
        $this->keys = $this->keys();
    }

    private function ids(){

        $ids[1] = 'heliotrope';
        $ids[2] = 'amethyst';
        $ids[3] = 'jade';
        $ids[4] = 'agate';
        $ids[5] = 'garnet';
        $ids[6] = 'beryl';
        $ids[7] = 'calcite';
        $ids[8] = 'emerald';
        $ids[9] = 'serpentine-stone';
        $ids[10] = 'ruby';
        $ids[11] = 'kyanite';
        $ids[12] = 'jasper';
        $ids[13] = 'coral';
        $ids[14] = 'diamond';
        $ids[15] = 'cats-eye';
        $ids[16] = 'opal';
        $ids[17] = 'lapis-lazuli';
        $ids[18] = 'turquoise';
        $ids[19] = 'malachite';
        $ids[20] = 'onyx';
        $ids[21] = 'obsidian';
        $ids[22] = 'sapphire';
        $ids[23] = 'moon-rock';
        $ids[24] = 'chrysolite';
        return $ids;
    }

    private function keys(){

        $keys['heliotrope'] = 1;
        $keys['amethyst'] = 2;
        $keys['jade'] = 3;
        $keys['agate'] = 4;
        $keys['garnet'] = 5;
        $keys['beryl'] = 6;
        $keys['calcite'] = 7;
        $keys['emerald'] = 8;
        $keys['serpentine-stone'] = 9;
        $keys['ruby'] = 10;
        $keys['kyanite'] = 11;
        $keys['jasper'] = 12;
        $keys['coral'] = 13;
        $keys['diamond'] = 14;
        $keys['cats-eye'] = 15;
        $keys['opal'] = 16;
        $keys['lapis-lazuli'] = 17;
        $keys['turquoise'] = 18;
        $keys['malachite'] = 19;
        $keys['onyx'] = 20;
        $keys['obsidian'] = 21;
        $keys['sapphire'] = 22;
        $keys['moon-rock'] = 23;
        $keys['chrysolite'] = 24;
        return $keys;
    }

}

