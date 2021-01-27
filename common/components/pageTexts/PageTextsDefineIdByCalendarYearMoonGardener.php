<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarYearMoonGardener

{

    public function define($gardenerNameURL)
    {
        $textID = 148;

        if ($gardenerNameURL == 'tomato'){
            $textID = 149;
        }
        if ($gardenerNameURL == 'cucumber'){
            $textID = 150;
        }
        if ($gardenerNameURL == 'pepper'){
            $textID = 151;
        }
        if ($gardenerNameURL == 'onions-on-greens'){
            $textID = 152;
        }
        if ($gardenerNameURL == 'cabbage'){
            $textID = 153;
        }
        if ($gardenerNameURL == 'asparagus'){
            $textID = 154;
        }
        if ($gardenerNameURL == 'eggplant'){
            $textID = 155;
        }
        if ($gardenerNameURL == 'zucchini'){
            $textID = 156;
        }
        if ($gardenerNameURL == 'squash'){
            $textID = 157;
        }
        if ($gardenerNameURL == 'pumpkin'){
            $textID = 158;
        }
        if ($gardenerNameURL == 'radish'){
            $textID = 159;
        }
        if ($gardenerNameURL == 'daikon'){
            $textID = 160;
        }
        if ($gardenerNameURL == 'greens'){
            $textID = 161;
        }
        if ($gardenerNameURL == 'potatoes'){
            $textID = 162;
        }
        if ($gardenerNameURL == 'jerusalem-artichoke'){
            $textID = 163;
        }
        if ($gardenerNameURL == 'strawberries'){
            $textID = 164;
        }
        if ($gardenerNameURL == 'peas'){
            $textID = 165;
        }
        if ($gardenerNameURL == 'beans'){
            $textID = 166;
        }
        if ($gardenerNameURL == 'carrot'){
            $textID = 167;
        }
        if ($gardenerNameURL == 'beet'){
            $textID = 168;
        }
        if ($gardenerNameURL == 'turnip'){
            $textID = 169;
        }
        if ($gardenerNameURL == 'celery'){
            $textID = 170;
        }
        if ($gardenerNameURL == 'melons'){
            $textID = 171;
        }
        if ($gardenerNameURL == 'unfavorable'){
            $textID = 172;
        }

        return $textID;
    }

}