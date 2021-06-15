<?php

return [
    //'/calendar/customize/' => 'customize/customize-page',

    [
        'pattern' => '/calendar/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
        'route' => 'calendar/years/year-page',
        'defaults' => ['yearURL' => '', 'countryURL' => ''],
    ],

    [
        'pattern' => '/calendar/seasons/<seasonURL:(winter|spring|summer|autumn)>/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
        'route' => 'calendar/seasons/season',
        'defaults' => ['yearURL' => '', 'seasonURL' => '', 'countryURL' => ''],
    ],

    [
        'pattern' => '/calendar/months/<monthURL>/<countryURL:[\w_-]+>',
        'route' => 'calendar/months/month-page',
        'defaults' => ['monthURL' => '', 'countryURL' => ''],
    ],

    [
        'pattern' => '/calendar/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>',
        'route' => 'calendar/days/day-page',
        'defaults' => ['dayNameURL' => '', 'dayURL' => ''],
    ],

    [
        'pattern' => '/calendar/religion/<religionURL:[\w_-]+>/years/<yearURL:\d{4}>',
        'route' => 'religion/religion-years/religion-year-page',
        'defaults' => ['yearURL' => '', 'religionURL' => ''],
    ],

    [
        'pattern' => '/calendar/religion/<religionURL:[\w_-]+>/months/<monthURL>',
        'route' => 'religion/religion-months/religion-month-page',
        'defaults' => ['monthURL' => '', 'religionURL' => ''],
    ],

    '/calendar/weeks/<yearURL:\d{4}>' => 'calendar/weeks/year-weeks-page',
    '/calendar/weeks/<yearURL:\d{4}>/<weekURL:\d{2}>' => 'calendar/weeks/week-page',

    [
        'pattern' => '/calendar/weeks/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>',
        'route' => 'calendar/weeks-days/week-day-page',
        'defaults' => ['dayNameURL' => '', 'dayURL' => ''],
    ],


];
