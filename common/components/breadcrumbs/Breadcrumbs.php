<?php

namespace common\components\breadcrumbs;

class Breadcrumbs
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function calendarYears($dateData)
    {

        return (new BreadcrumbsCalendarYears())->breadcrumbs($dateData);

    }

    public function calendarMonths($dateData, $countryURL)
    {

        return (new BreadcrumbsCalendarMonths())->breadcrumbs($dateData, $countryURL);

    }

    public function calendarDays($dateData)
    {

        return (new BreadcrumbsCalendarDays())->breadcrumbs($dateData);

    }

    public function calendarSeasons($dateData, $seasonURL, $countryURL)
    {

        return (new BreadcrumbsCalendarSeasons())->breadcrumbs($dateData, $seasonURL, $countryURL);

    }

    public function calendarWeeksYears($dateData)
    {

        return (new BreadcrumbsCalendarWeeksYears())->breadcrumbs($dateData);

    }


    public function  calendarWeeksWeek($dateData, $weekURL)
    {

        return (new BreadcrumbsCalendarWeeksWeek())->breadcrumbs($dateData, $weekURL);

    }

    public function  calendarWeeksToday($dateData)
    {

        return (new BreadcrumbsCalendarWeeksToday())->breadcrumbs($dateData);

    }


    public function  calendarBusinessMonths($dateData, $countryURL)
    {

        return (new BreadcrumbsCalendarBusinessMonths())->breadcrumbs($dateData, $countryURL);

    }

    public function  calendarBusinessQuarters($dateData, $quarter, $countryURL)
    {

        return (new BreadcrumbsCalendarBusinessQuarters())->breadcrumbs($dateData, $quarter, $countryURL);

    }


    public function  calendarBusinessDaysOffMonths($dateData, $countryURL)
    {

        return (new BreadcrumbsCalendarBusinessDaysOffMonths())->breadcrumbs($dateData, $countryURL);

    }

    public function  calendarBusinessWorkingDaysMonths($dateData, $countryURL)
    {

        return (new BreadcrumbsCalendarBusinessWorkingDaysMonths())->breadcrumbs($dateData, $countryURL);

    }

    public function  calendarBusinessFortyMonths($dateData, $countryURL)
    {

        return (new BreadcrumbsCalendarBusinessFortyMonths())->breadcrumbs($dateData, $countryURL);

    }

    public function  calendarBusinessThirtyMonths($dateData, $countryURL)
    {

        return (new BreadcrumbsCalendarBusinessThirtyMonths())->breadcrumbs($dateData, $countryURL);

    }

    public function  calendarBusinessSixDaysMonths($dateData, $countryURL)
    {

        return (new BreadcrumbsCalendarBusinessSixDaysMonths())->breadcrumbs($dateData, $countryURL);

    }


    public function  calendarEastern($dateData)
    {

        return (new BreadcrumbsCalendarEastern())->breadcrumbs($dateData);

    }

    public function  calendarEasternYears($dateData)
    {

        return (new BreadcrumbsCalendarEasternYears())->breadcrumbs($dateData);

    }

    public function  calendarEasternAnimals($eastern)
    {

        return (new BreadcrumbsCalendarEasternAnimals())->breadcrumbs($eastern);

    }

    public function  holidaysMonths($dateData, $countryURL)
    {

        return (new BreadcrumbsHolidaysMonths())->breadcrumbs($dateData, $countryURL);

    }

    public function  holidaysSeasons($dateData, $seasonURL)
    {

        return (new BreadcrumbsHolidaysSeasons())->breadcrumbs($dateData, $seasonURL);

    }

    public function  holidaysDays($dateData, $countryURL)
    {

        return (new BreadcrumbsHolidaysDays())->breadcrumbs($dateData, $countryURL);

    }

    public function  holidaysHoliday($dateData, $countryURL, $holidayData)
    {

        return (new BreadcrumbsHolidaysHoliday())->breadcrumbs($dateData, $countryURL, $holidayData);

    }

    public function  moonMonths($dateData)
    {

        return (new BreadcrumbsMoonMonths())->breadcrumbs($dateData);

    }

    public function  moonMonthsGardener($dateData, $gardenerNameURL)
    {

        return (new BreadcrumbsMoonMonthsGardener())->breadcrumbs($dateData, $gardenerNameURL);

    }

    public function  moonMonthsGood($dateData, $dayNameURL)
    {

        return (new BreadcrumbsMoonMonthsGood())->breadcrumbs($dateData, $dayNameURL);

    }

    public function  moonMonthsPhase($dateData)
    {

        return (new BreadcrumbsMoonMonthsPhase())->breadcrumbs($dateData);

    }

    public function  moonMonthsPhases($dateData, $phaseURL)
    {

        return (new BreadcrumbsMoonMonthsPhases())->breadcrumbs($dateData, $phaseURL);

    }

    public function  moonYearsPhases($dateData, $phaseURL)
    {

        return (new BreadcrumbsMoonYearsPhases())->breadcrumbs($dateData, $phaseURL);

    }

    public function  moonYearsGood($dateData, $dayNameURL)
    {

        return (new BreadcrumbsMoonYearsGood())->breadcrumbs($dateData, $dayNameURL);

    }


    public function  moonYearsGardener($dateData, $gardenerNameURL)
    {

        return (new BreadcrumbsMoonYearsGardener())->breadcrumbs($dateData, $gardenerNameURL);

    }

    public function  moonDays($dateData)
    {

        return (new BreadcrumbsMoonDays())->breadcrumbs($dateData);

    }

    public function  moonDaysPhases($dateData)
    {

        return (new BreadcrumbsMoonDaysPhases())->breadcrumbs($dateData);

    }

    public function  religionMonths($dateData, $religionURL)
    {

        return (new BreadcrumbsReligionMonths())->breadcrumbs($dateData, $religionURL);

    }

    public function  religionYears($dateData, $religionURL)
    {

        return (new BreadcrumbsReligionYears())->breadcrumbs($dateData, $religionURL);

    }

    public function  zodiacMonths($dateData)
    {

        return (new BreadcrumbsZodiacMonths())->breadcrumbs($dateData);

    }

    public function  zodiacYears($dateData)
    {

        return (new BreadcrumbsZodiacYears())->breadcrumbs($dateData);

    }

    public function  zodiac()
    {

        return (new BreadcrumbsZodiac())->breadcrumbs();

    }

    public function  zodiacSigns($zodiacs)
    {

        return (new BreadcrumbsZodiacSigns())->breadcrumbs($zodiacs);

    }

    public function  zodiacDays($dateData)
    {

        return (new BreadcrumbsZodiacDays())->breadcrumbs($dateData);

    }

}

