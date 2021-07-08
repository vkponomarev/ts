<?php

namespace common\componentsV2\calculators;


class CalculatorsConversion
{

    public $active;
    public $result;
    public $second;
    private $timeOne;
    private $timeTwo;

    function __construct($params, $current, $second, $names, $someTime = 0)
    {

        $this->second = 0;

        $this->first = new CalculatorsConversionFirst($params, $current, $someTime);
        $this->second = new CalculatorsConversionSecond($params, $current, $second, $names);

        if ($this->first->name == 'seconds'){
            if ($this->second->name == 'seconds'){
                $this->second->value =  $this->first->value;
            }
            if ($this->second->name == 'minutes'){
                $this->second->value =  $this->first->value / 60;
            }
            if ($this->second->name == 'hours'){
                $this->second->value =  $this->first->value / 60 / 60;
            }
            if ($this->second->name == 'days'){
                $this->second->value =  $this->first->value / 60 / 60 / 24;
            }
            if ($this->second->name == 'weeks'){
                $this->second->value =  $this->first->value / 60 / 60 / 24 / 7;
            }
            if ($this->second->name == 'months'){
                $this->second->value =  $this->first->value / 60 / 60 / 24 / 30;
            }
            if ($this->second->name == 'years'){
                $this->second->value =  $this->first->value / 60 / 60 / 24 / 365;
            }

        }

        if ($this->first->name == 'minutes'){
            if ($this->second->name == 'seconds'){
                $this->second->value =  $this->first->value * 60;
            }
            if ($this->second->name == 'minutes'){
                $this->second->value =  $this->first->value;
            }
            if ($this->second->name == 'hours'){
                $this->second->value =  $this->first->value / 60;
            }
            if ($this->second->name == 'days'){
                $this->second->value =  $this->first->value / 60 / 24;
            }
            if ($this->second->name == 'weeks'){
                $this->second->value =  $this->first->value / 60 / 24 / 7;
            }
            if ($this->second->name == 'months'){
                $this->second->value =  $this->first->value / 60 / 24 / 30;
            }
            if ($this->second->name == 'years'){
                $this->second->value =  $this->first->value / 60 / 24 / 365;
            }

        }

        if ($this->first->name == 'hours'){
            if ($this->second->name == 'seconds'){
                $this->second->value =  $this->first->value * 60 * 60;
            }
            if ($this->second->name == 'minutes'){
                $this->second->value =  $this->first->value * 60;
            }
            if ($this->second->name == 'hours'){
                $this->second->value =  $this->first->value;
            }
            if ($this->second->name == 'days'){
                $this->second->value =  $this->first->value / 24;
            }
            if ($this->second->name == 'weeks'){
                $this->second->value =  $this->first->value / 24 / 7;
            }
            if ($this->second->name == 'months'){
                $this->second->value =  $this->first->value / 24 / 30;
            }
            if ($this->second->name == 'years'){
                $this->second->value =  $this->first->value / 24 / 365;
            }

        }

        if ($this->first->name == 'days'){
            if ($this->second->name == 'seconds'){
                $this->second->value =  $this->first->value * 24 * 60 * 60 ;
            }
            if ($this->second->name == 'minutes'){
                $this->second->value =  $this->first->value * 24 * 60;
            }
            if ($this->second->name == 'hours'){
                $this->second->value =  $this->first->value * 24;
            }
            if ($this->second->name == 'days'){
                $this->second->value =  $this->first->value;
            }
            if ($this->second->name == 'weeks'){
                $this->second->value =  $this->first->value / 7;
            }
            if ($this->second->name == 'months'){
                $this->second->value =  $this->first->value / 30;
            }
            if ($this->second->name == 'years'){
                $this->second->value =  $this->first->value / 365;
            }

        }

        if ($this->first->name == 'weeks'){
            if ($this->second->name == 'seconds'){
                $this->second->value =  $this->first->value * 60 * 60 * 24 * 7;
            }
            if ($this->second->name == 'minutes'){
                $this->second->value =  $this->first->value * 60 * 24 * 7;
            }
            if ($this->second->name == 'hours'){
                $this->second->value =  $this->first->value * 24 * 7;
            }
            if ($this->second->name == 'days'){
                $this->second->value =  $this->first->value * 7;
            }
            if ($this->second->name == 'weeks'){
                $this->second->value =  $this->first;
            }
            if ($this->second->name == 'months'){
                $this->second->value =  $this->first->value / 4;
            }
            if ($this->second->name == 'years'){
                $this->second->value =  $this->first->value / 52;
            }

        }

        if ($this->first->name == 'months'){
            if ($this->second->name == 'seconds'){
                $this->second->value =  $this->first->value * 60 * 60 * 24 * 30;
            }
            if ($this->second->name == 'minutes'){
                $this->second->value =  $this->first->value * 60 * 24 * 30;
            }
            if ($this->second->name == 'hours'){
                $this->second->value =  $this->first->value * 24 * 30;
            }
            if ($this->second->name == 'days'){
                $this->second->value =  $this->first->value * 30;
            }
            if ($this->second->name == 'weeks'){
                $this->second->value =  $this->first->value * 30 / 7;
            }
            if ($this->second->name == 'months'){
                $this->second->value =  $this->first->value;
            }
            if ($this->second->name == 'years'){
                $this->second->value =  $this->first->value / 12;
            }

        }

        if ($this->first->name == 'years'){
            if ($this->second->name == 'seconds'){
                $this->second->value =  $this->first->value * 60 * 60 * 24 * 365;
            }
            if ($this->second->name == 'minutes'){
                $this->second->value =  $this->first->value * 60 * 24 * 365;
            }
            if ($this->second->name == 'hours'){
                $this->second->value =  $this->first->value * 24 * 365;
            }
            if ($this->second->name == 'days'){
                $this->second->value =  $this->first->value * 365;
            }
            if ($this->second->name == 'weeks'){
                $this->second->value =  $this->first->value * 365 / 7;
            }
            if ($this->second->name == 'months'){
                $this->second->value =  $this->first->value * 12;
            }
            if ($this->second->name == 'years'){
                $this->second->value =  $this->first->value;
            }

        }

        //$this->second->value =  number_format($this->second->value, 8);
    }

}

