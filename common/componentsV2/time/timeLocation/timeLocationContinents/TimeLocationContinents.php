<?php

namespace common\componentsV2\time\timeLocation\timeLocationContinents;


class TimeLocationContinents
{


    public $data;

    /**
     * TimeCity constructor.
     * @param $city
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($params, $languageID)
    {
        if (isset($params['location']['continentsArray']) && $params['location']['continentsArray'])
            $this->data =
                (new TimeLocationContinentsData($languageID))->data;
    }
}
