<?php

namespace common\componentsV2\calendars;


class Calendars
{

    public $links;
    public $businessLinks;
    public $moonLinks;


    function __construct($year)
    {
        $this->links($year);
        $this->businessLinks($year);
        $this->moonLinks($year);
    }

    private function links($year){
        $this->links = (new CalendarsLinks())->calendars($year);
        return $this;
    }

    private  function businessLinks($year){
        $this->businessLinks = (new CalendarsBusinessLinks())->calendars($year);
        return $this;
    }

    private  function moonLinks($year){
        $this->moonLinks = (new CalendarsMoonLinks())->calendars($year);
        return $this;
    }
}

