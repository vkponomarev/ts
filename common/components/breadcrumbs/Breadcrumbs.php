<?php

namespace common\components\breadcrumbs;

class Breadcrumbs
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function calendarYears($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarYears())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function calendarMonths($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarMonths())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function calendarDays($dateData)
    {

        return (new BreadcrumbsCalendarDays())->breadcrumbs($dateData);

    }

    public function calendarSeasons($dateData, $seasonURL, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarSeasons())->breadcrumbs($dateData, $seasonURL, $countryURL, $countryData);

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


    public function  calendarBusinessMonths($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessMonths())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessQuarters($dateData, $quarter, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessQuarters())->breadcrumbs($dateData, $quarter, $countryURL, $countryData);

    }


    public function  calendarBusinessDaysOffMonths($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessDaysOffMonths())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessWorkingDaysMonths($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessWorkingDaysMonths())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessFortyMonths($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessFortyMonths())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessThirtyMonths($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessThirtyMonths())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessSixDaysMonths($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessSixDaysMonths())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessYears($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessYears())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessWorkingDaysYears($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessWorkingDaysYears())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessDaysOffYears($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessDaysOffYears())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessSixDaysYears($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessSixDaysYears())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessThirtyYears($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessThirtyYears())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarBusinessFortyYears($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsCalendarBusinessFortyYears())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  calendarEastern($dateData)
    {

        return (new BreadcrumbsCalendarEastern())->breadcrumbs($dateData);

    }

    public function  calendarEasternYears($dateData)
    {

        return (new BreadcrumbsCalendarEasternYears())->breadcrumbs($dateData);

    }

    public function  calendarEasternAnimals($eastern, $dateData)
    {

        return (new BreadcrumbsCalendarEasternAnimals())->breadcrumbs($eastern, $dateData);

    }

    public function  holidaysMonths($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsHolidaysMonths())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  holidaysYears($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsHolidaysYears())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  holidaysSeasons($dateData, $seasonURL)
    {

        return (new BreadcrumbsHolidaysSeasons())->breadcrumbs($dateData, $seasonURL);

    }

    public function  holidaysDays($dateData, $countryURL, $countryData)
    {

        return (new BreadcrumbsHolidaysDays())->breadcrumbs($dateData, $countryURL, $countryData);

    }

    public function  holidaysHoliday($dateData, $countryURL, $holidayData, $countryData)
    {

        return (new BreadcrumbsHolidaysHoliday())->breadcrumbs($dateData, $countryURL, $holidayData, $countryData);

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

    public function  moonYears($dateData)
    {

        return (new BreadcrumbsMoonYears())->breadcrumbs($dateData);

    }

    public function  moonYearsPhase($dateData)
    {

        return (new BreadcrumbsMoonYearsPhase())->breadcrumbs($dateData);

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

