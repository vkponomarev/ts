<?php

return [

    ///////////////////////
    /////////////////////// Время намаза
    ///////////////////////


    'calculators/how-many/<calcNameURL>/<calcNameSecondURL>' => 'calculators/calculators-how-many/calculators-how-many-page' ,

    'calculators/convert/<calcNameURL>/<calcNameSecondURL>/<someTimeURL>' => 'calculators/calculators-convert-some-time-to-time/calculators-convert-some-time-to-time-page' ,
    'calculators/convert/<calcNameURL>/<calcNameSecondURL>' => 'calculators/calculators-convert/calculators-convert-page' ,
    'calculators/names/date' => 'calculators/calculators-names-date/calculators-name-date-page' ,
    'calculators/names/<calcNameURL>' => 'calculators/calculators-names/calculators-name-page' ,
    'calculators/time/<methodURL>' => 'calculators/calculators-time/calculators-time-page',
    'calculators/' => 'calculators/calculators/calculators-page',

/*
    'namaz/' => 'namaz/namaz/namaz-page',

    'namaz/cities/<cityURL>/years/<yearURL>' => 'namaz/namaz-cities-city-years/namaz-cities-city-year-page',
    'namaz/cities/<cityURL>/months/<monthURL>' => 'namaz/namaz-cities-city-months/namaz-cities-city-month-page',
    'namaz/cities/<cityURL>/<timesOfDayURL:(morning|evening)>' => 'namaz/namaz-cities-city-times-of-day/namaz-cities-city-times-of-day-page',
    'namaz/cities/<cityURL>' => 'namaz/namaz-cities-city/namaz-cities-city-page',
*/

    //'time/cities' => 'time/time-cities/time-cities-page',

    //'namaz/months/<monthURL>/<cityURL>' => 'namaz/namaz-months/namaz-month-page',

];
