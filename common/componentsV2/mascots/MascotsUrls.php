<?php

namespace common\componentsV2\mascots;

use Yii;
use yii\web\NotFoundHttpException;


class MascotsUrls
{

    public $ids;
    public $keys;

    function __construct()
    {
        $this->ids = $this->ids();
        $this->keys = $this->keys();
    }

    private function ids(){

        $ids[1] = 'the-golden-fleece';
        $ids[2] = 'the-hammer';
        $ids[3] = 'owl';
        $ids[4] = 'golden-calf';
        $ids[5] = 'mask';
        $ids[6] = 'snake';
        $ids[7] = 'clover';
        $ids[8] = 'emerald';
        $ids[9] = 'ladybug';
        $ids[10] = 'lion';
        $ids[11] = 'eagle';
        $ids[12] = 'aster';
        $ids[13] = 'grasshopper';
        $ids[14] = 'book';
        $ids[15] = 'heart';
        $ids[16] = 'opal';
        $ids[17] = 'scorpio';
        $ids[18] = 'bug';
        $ids[19] = 'horseshoe';
        $ids[20] = 'salamander';
        $ids[21] = 'black-cat';
        $ids[22] = 'icon';
        $ids[23] = 'key';
        $ids[24] = 'narcissus';
        $ids[25] = 'knot';

        return $ids;
    }

    private function keys(){

        $keys['the-golden-fleece'] = 1;
        $keys['the-hammer'] = 2;
        $keys['owl'] = 3;
        $keys['golden-calf'] = 4;
        $keys['mask'] = 5;
        $keys['snake'] = 6;
        $keys['clover'] = 7;
        $keys['emerald'] = 8;
        $keys['ladybug'] = 9;
        $keys['lion'] = 10;
        $keys['eagle'] = 11;
        $keys['aster'] = 12;
        $keys['grasshopper'] = 13;
        $keys['book'] = 14;
        $keys['heart'] = 15;
        $keys['opal'] = 16;
        $keys['scorpio'] = 17;
        $keys['bug'] = 18;
        $keys['horseshoe'] = 19;
        $keys['salamander'] = 20;
        $keys['black-cat'] = 21;
        $keys['icon'] = 22;
        $keys['key'] = 23;
        $keys['narcissus'] = 24;
        $keys['knot'] = 25;
        return $keys;
    }


}

