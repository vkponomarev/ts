<?php

return [

    ///////////////////////
    /////////////////////// ВРЕМЯ
    ///////////////////////

    'time/' => 'time/time/time-page',

    //'time/timezones/<zoneNameURL:(utc|gmt)>/<zoneTime>' => 'time/time-zones-utc-time/time-zones-utc-time-page',
    //'time/timezones/<zoneNameURL:(utc|gmt)>' => 'time/time-zones-utc/time-zones-utc-page',


    'time/continents/<continentURL>' => 'time/time-continents-continent/time-continents-continent-page',
    'time/continents' => 'time/time-continents/time-continents-page',

    'time/countries/<countryURL>' => 'time/time-countries-country/time-countries-country-page',
    'time/countries' => 'time/time-countries/time-countries-page',

    'time/regions/<regionURL>' => 'time/time-regions-region/time-regions-region-page',
    'time/regions' => 'time/time-regions/time-regions-page',

    'time/cities/<cityURL>' => 'time/time-cities-city/time-cities-city-page',
    'time/cities' => 'time/time-cities/time-cities-page',

    'time/capitals' => 'time/time-capitals/time-capitals-page',

    'time/difference/cities/<cityURL>/<cityURL2>' => 'time/time-difference-city-city/time-difference-city-city-page',
    'time/difference/cities/<cityURL>' => 'time/time-difference-city/time-difference-city-page',


    'time/timezones/abbr/<zoneURL>/<zoneTime>' => 'time/time-zones-zone-abbreviation-time/time-zones-zone-abbreviation-time-page',
    'time/timezones/abbr/<zoneURL>' => 'time/time-zones-zone-abbreviation/time-zones-zone-abbreviation-page',
    'time/timezones/iana/<zoneURL>' => 'time/time-zones-zone-iana/time-zones-zone-iana-page',
    //'time/timezones/<zoneURL>' => 'time/time-zones-zone/time-zones-zone-page',
    'time/timezones' => 'time/time-zones/time-zones-page',


];
