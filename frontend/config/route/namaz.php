<?php

return [

    ///////////////////////
    /////////////////////// Время намаза
    ///////////////////////

    'namaz/' => 'namaz/namaz/namaz-page',

    'namaz/cities/<cityURL>/years/<yearURL>' => 'namaz/namaz-cities-city-years/namaz-cities-city-year-page',
    'namaz/cities/<cityURL>/months/<monthURL>' => 'namaz/namaz-cities-city-months/namaz-cities-city-month-page',
    'namaz/cities/<cityURL>/<timesOfDayURL:(morning|evening)>' => 'namaz/namaz-cities-city-times-of-day/namaz-cities-city-times-of-day-page',
    'namaz/cities/<cityURL>' => 'namaz/namaz-cities-city/namaz-cities-city-page',


    //'time/cities' => 'time/time-cities/time-cities-page',

    //'namaz/months/<monthURL>/<cityURL>' => 'namaz/namaz-months/namaz-month-page',

];
