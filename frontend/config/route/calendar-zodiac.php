<?php

return [

    '/zodiac' => 'zodiac/zodiac/zodiac-page',
    '/zodiac/<signURL:[\w_-]+>' => 'zodiac/zodiac-signs/zodiac-sign-page',
    '/calendar/zodiac/years/<yearURL:\d{4}>' => 'zodiac/zodiac-years/zodiac-year-page',
    '/calendar/zodiac/months/<monthURL>' => 'zodiac/zodiac-months/zodiac-month-page',

    [
        'pattern' => '/calendar/zodiac/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>',
        'route' => 'zodiac/zodiac-days/zodiac-day-page',
        'defaults' => ['dayNameURL' => '', 'dayURL' => ''],
    ],

];
