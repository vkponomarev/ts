<?php

return [

    [
        'pattern' => '/holidays/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
        'route' => 'holidays/holidays-years/holidays-year-page',
        'defaults' => ['yearURL' => '', 'countryURL' => ''],
    ],

    [
        'pattern' => '/holidays/months/<monthURL>/<countryURL:[\w_-]+>',
        'route' => 'holidays/holidays-months/holidays-month-page',
        'defaults' => ['monthURL' => '', 'countryURL' => ''],
    ],

    [
        'pattern' => '/holidays/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>/<countryURL:[\w_-]+>',
        'route' => 'holidays/holidays-days/holidays-day-page',
        'defaults' => ['dayNameURL' => '', 'dayURL' => '', 'countryURL' => ''],
    ],

    [
        'pattern' => '/holidays/<holidayNameURL>/<countryURL:[\w_-]+>',
        'route' => 'holidays/holidays-holiday/holidays-holiday-page',
        'defaults' => ['holidayNameURL' => '', 'countryURL' => ''],
    ],

    '/holidays/seasons/<seasonURL:(winter|spring|summer|autumn)>/<yearURL:\d{4}>' => 'holidays/holidays-seasons/holidays-season-page',



];
