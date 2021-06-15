<?php

namespace common\componentsV2\time\timeTimezone;

use common\componentsV2\time\timeTimezone\timeTimezoneAbbreviation\TimeTimezoneAbbreviation;
use common\componentsV2\time\timeTimezone\timeTimezoneAbbreviations\TimeTimezoneAbbreviations;
use common\componentsV2\time\timeTimezone\timeTimezoneIana\TimeTimezoneIana;
use common\componentsV2\time\timeTimezone\timeTimezoneIanas\TimeTimezoneIanas;


class TimeTimezone
{

    public $current;
    public $abbreviations;
    public $abbreviation;
    public $abbreviationTime;
    public $ianas;
    public $iana;

    /**
     * @var \DateTime Дата и время текущего часового пояса
     */
    public $date;

    //public $array;

    // Листинг всех America/Chicago ... названий тайм зон
    //(new \common\components\dump\Dump())->printR(timezone_identifiers_list());die;


    public function __construct($params, $languageID)
    {

        if (isset($params['timezone']['abbreviations']) && $params['timezone']['abbreviations']) {

            $this->abbreviations =
                (new TimeTimezoneAbbreviations($params, $languageID)
                )->data;

        }

        if (isset($params['timezone']['ianas']) && $params['timezone']['ianas']) {
            $this->ianas =
                (new TimeTimezoneIanas($params)
                )->data;
        }

        if (isset($params['timezone']['abbreviationID']) && $params['timezone']['abbreviationID']) {
            $this->abbreviation =
                (new TimeTimezoneAbbreviation($params, $languageID)
                );
        }

        if (isset($params['timezone']['ianaID']) && $params['timezone']['ianaID']) {
            $this->iana =
                (new TimeTimezoneIana($params, $languageID)
                );
        }



    }
}

