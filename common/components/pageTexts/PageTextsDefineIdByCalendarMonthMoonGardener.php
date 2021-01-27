<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarMonthMoonGardener

{

    public function define($gardenerNameURL)
    {
        $textID = 173;

        if ($gardenerNameURL == 'tomato'){
            $textID = 174;
        }
        if ($gardenerNameURL == 'cucumber'){
            $textID = 175;
        }
        if ($gardenerNameURL == 'pepper'){
            $textID = 176;
        }
        if ($gardenerNameURL == 'onions-on-greens'){
            $textID = 177;
        }
        if ($gardenerNameURL == 'cabbage'){
            $textID = 178;
        }
        if ($gardenerNameURL == 'asparagus'){
            $textID = 179;
        }
        if ($gardenerNameURL == 'eggplant'){
            $textID = 180;
        }
        if ($gardenerNameURL == 'zucchini'){
            $textID = 181;
        }
        if ($gardenerNameURL == 'squash'){
            $textID = 182;
        }
        if ($gardenerNameURL == 'pumpkin'){
            $textID = 183;
        }
        if ($gardenerNameURL == 'radish'){
            $textID = 184;
        }
        if ($gardenerNameURL == 'daikon'){
            $textID = 185;
        }
        if ($gardenerNameURL == 'greens'){
            $textID = 186;
        }
        if ($gardenerNameURL == 'potatoes'){
            $textID = 187;
        }
        if ($gardenerNameURL == 'jerusalem-artichoke'){
            $textID = 188;
        }
        if ($gardenerNameURL == 'strawberries'){
            $textID = 189;
        }
        if ($gardenerNameURL == 'peas'){
            $textID = 190;
        }
        if ($gardenerNameURL == 'beans'){
            $textID = 191;
        }
        if ($gardenerNameURL == 'carrot'){
            $textID = 192;
        }
        if ($gardenerNameURL == 'beet'){
            $textID = 193;
        }
        if ($gardenerNameURL == 'turnip'){
            $textID = 194;
        }
        if ($gardenerNameURL == 'celery'){
            $textID = 195;
        }
        if ($gardenerNameURL == 'melons'){
            $textID = 196;
        }
        if ($gardenerNameURL == 'unfavorable'){
            $textID = 197;
        }

        return $textID;
    }

}