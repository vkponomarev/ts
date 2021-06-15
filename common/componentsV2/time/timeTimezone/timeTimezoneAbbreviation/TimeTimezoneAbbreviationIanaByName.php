<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviation;

class TimeTimezoneAbbreviationIana
{

    public $abbreviation;
    private $abbreviationIana;

    public function __construct($offset, $date)
    {

        $this->abbreviation = 0;

        $this->abbreviationIana =
            timezone_name_from_abbr(
                "",
                (new \DateTime())->setTimezone(
                    new \DateTimeZone($offset))->getOffset(),
                0);

        if ($this->abbreviationIana) {

            $timeInAbbr = (new \DateTime())->setTimezone(
                new \DateTimeZone($this->abbreviationIana));

            if ($timeInAbbr->format('Y-m-d h') <> $date->format('Y-m-d h')) {

                $this->abbreviationIana =
                    timezone_name_from_abbr(
                        "",
                        (new \DateTime())->setTimezone(
                            new \DateTimeZone($offset))->getOffset(),
                        1);

                if ($this->abbreviationIana) {

                    $timeInAbbr = (new \DateTime())->setTimezone(
                        new \DateTimeZone($this->abbreviationIana));

                    if ($timeInAbbr->format('Y-m-d h') == $date->format('Y-m-d h')) {

                        $this->abbreviation = $this->abbreviationIana;

                    } else {

                        $this->abbreviation = 0;

                    }

                }


            } else {

                $this->abbreviation = $this->abbreviationIana;

            }


        }
    }

}
