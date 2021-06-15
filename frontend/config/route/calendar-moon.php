<?php

return [

    [
        'pattern' => '/calendar/moon/good/years/<yearURL:\d{4}>/<dayNameURL:[\w_-]+>',
        'route' => 'moon/moon-years-good/moon-year-good-page',
        'defaults' => ['dayNameURL' => '', 'yearURL' => ''],
    ],

    [
        'pattern' => '/calendar/moon/good/months/<monthURL>/<dayNameURL:[\w_-]+>',
        'route' => 'moon/moon-months-good/moon-month-good-page',
        'defaults' => ['dayNameURL' => '', 'monthURL' => ''],
    ],

    [
        'pattern' => '/calendar/moon/gardener/years/<yearURL:\d{4}>/<gardenerNameURL:[\w_-]+>',
        'route' => 'moon/moon-years-gardener/moon-year-gardener-page',
        'defaults' => ['gardenerNameURL' => '', 'yearURL' => ''],
    ],

    [
        'pattern' => '/calendar/moon/gardener/months/<monthURL>/<gardenerNameURL:[\w_-]+>',
        'route' => 'moon/moon-months-gardener/moon-month-gardener-page',
        'defaults' => ['gardenerNameURL' => '', 'monthURL' => ''],
    ],

    [
        'pattern' => '/calendar/moon/phases/years/<yearURL:\d{4}>/<phaseURL:[\w_-]+>',
        'route' => 'moon/moon-years-phases/moon-year-phase-page',
        'defaults' => ['phaseURL' => '', 'yearURL' => ''],
    ],

    [
        'pattern' => '/calendar/moon/phases/months/<monthURL>/<phaseURL:[\w_-]+>',
        'route' => 'moon/moon-months-phases/moon-month-phase-page',
        'defaults' => ['phaseURL' => '', 'monthURL' => ''],
    ],

    [
        'pattern' => '/calendar/moon/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>',
        'route' => 'moon/moon-days/moon-day-page',
        'defaults' => ['dayNameURL' => '', 'dayURL' => ''],
    ],

    [
        'pattern' => '/calendar/moon/phases/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>',
        'route' => 'moon/moon-days-phases/moon-day-phase-page',
        'defaults' => ['dayNameURL' => '', 'dayURL' => ''],
    ],

    '/calendar/moon/months/<monthURL>' => 'moon/moon-months/moon-month-page',
    '/calendar/moon/years/<yearURL:\d{4}>' => 'moon/moon-years/moon-year-page',

    '/calendar/moon/phase/months/<monthURL>' => 'moon/moon-months-phase/moon-month-phase-page',
    '/calendar/moon/phase/years/<yearURL:\d{4}>' => 'moon/moon-years-phase/moon-year-phase-page',


];
