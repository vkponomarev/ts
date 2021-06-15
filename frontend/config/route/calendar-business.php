<?php

return [
    [
        'pattern' => '/calendar/days-off/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
        'route' => 'business/business-days-off-years/business-days-off-year-page',
        'defaults' => ['yearURL' => '', 'countryURL' => ''],
    ],

    [
        'pattern' => '/calendar/days-off/months/<monthURL>/<countryURL:[\w_-]+>',
        'route' => 'business/business-days-off-months/business-days-off-month-page',
        'defaults' => ['monthURL' => '', 'countryURL' => ''],
    ],


    [
        'pattern' => '/calendar/working/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
        'route' => 'business/business-working-days-years/business-working-days-year-page',
        'defaults' => ['yearURL' => '', 'countryURL' => ''],
    ],

    [
        'pattern' => '/calendar/working/months/<monthURL>/<countryURL:[\w_-]+>',
        'route' => 'business/business-working-days-months/business-working-days-month-page',
        'defaults' => ['monthURL' => '', 'countryURL' => ''],
    ],


    [
        'pattern' => '/calendar/business/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
        'route' => 'business/business-years/business-year-page',
        'defaults' => ['yearURL' => '', 'countryURL' => ''],
    ],


    [
        'pattern' => '/calendar/business/months/<monthURL>/<countryURL:[\w_-]+>',
        'route' => 'business/business-months/business-month-page',
        'defaults' => ['monthURL' => '', 'countryURL' => ''],
    ],


    [
        'pattern' => '/calendar/business/forty/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
        'route' => 'business/business-forty-years/business-forty-year-page',
        'defaults' => ['yearURL' => '', 'countryURL' => ''],
    ],


    [
        'pattern' => '/calendar/business/forty/months/<monthURL>/<countryURL:[\w_-]+>',
        'route' => 'business/business-forty-months/business-forty-month-page',
        'defaults' => ['monthURL' => '', 'countryURL' => ''],
    ],


    [
        'pattern' => '/calendar/business/thirty/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
        'route' => 'business/business-thirty-years/business-thirty-year-page',
        'defaults' => ['yearURL' => '', 'countryURL' => ''],
    ],


    [
        'pattern' => '/calendar/business/thirty/months/<monthURL>/<countryURL:[\w_-]+>',
        'route' => 'business/business-thirty-months/business-thirty-month-page',
        'defaults' => ['monthURL' => '', 'countryURL' => ''],
    ],

    [
        'pattern' => '/calendar/business/six-days/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
        'route' => 'business/business-six-days-years/business-six-days-year-page',
        'defaults' => ['yearURL' => '', 'countryURL' => ''],
    ],


    [
        'pattern' => '/calendar/business/six-days/months/<monthURL>/<countryURL:[\w_-]+>',
        'route' => 'business/business-six-days-months/business-six-days-month-page',
        'defaults' => ['monthURL' => '', 'countryURL' => ''],
    ],


    [
        'pattern' => '/calendar/business/quarters/<yearURL:\d{4}>/<quarterURL:\d{1}>/<countryURL:[\w_-]+>',
        'route' => 'business/business-quarters/business-quarter-page',
        'defaults' => ['yearURL' => '', 'quarterURL' => '', 'countryURL' => ''],
    ],


];
