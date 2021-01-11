<?php

namespace common\components\pdfCalendars;

class PDFCalendarsWeeklyExists
{

    public function calendars($year, $language, $weekURL)
    {
/*
        $calendarYearlyP = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf');
        $calendarYearlyPPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyPPathRelative = '/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyPImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg');
        $calendarYearlyPImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg';
        $calendarYearlyPImgPathRelative = '/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg';

        $calendarYearlyL = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf');
        $calendarYearlyLImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg');
        $calendarYearlyLPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyLPathRelative = '/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyLImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg';
        $calendarYearlyLImgPathRelative = '/calendars-pdf/' . $countryURL . '/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg';
*/
        $calendarWeeklyPNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-P-' . $language . '.pdf');
        $calendarWeeklyPNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-P-' . $language . '.jpg');
        $calendarWeeklyPNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-P-' . $language . '.pdf';
        $calendarWeeklyPNoHolidaysPathRelative = '/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-P-' . $language . '.pdf';
        $calendarWeeklyPNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-P-' . $language . '.jpg';
        $calendarWeeklyPNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-P-' . $language . '.jpg';

        $calendarWeeklyLNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-L-' . $language . '.pdf');
        $calendarWeeklyLNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-L-' . $language . '.jpg');
        $calendarWeeklyLNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-L-' . $language . '.pdf';
        $calendarWeeklyLNoHolidaysPathRelative = '/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-L-' . $language . '.pdf';
        $calendarWeeklyLNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-L-' . $language . '.jpg';
        $calendarWeeklyLNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/weeks/calendar-weekly-' . $year . '-' . $weekURL . '-L-' . $language . '.jpg';

        $pdf['weeklyPNoHolidays'] = [
            'pdfExists' => $calendarWeeklyPNoHolidays,
            'imgExists' => $calendarWeeklyPNoHolidaysImg,
            'pdfPath' => $calendarWeeklyPNoHolidaysPath,
            'imgPath' => $calendarWeeklyPNoHolidaysImgPath,
            'pdfPathRelative' => $calendarWeeklyPNoHolidaysPathRelative,
            'imgPathRelative' => $calendarWeeklyPNoHolidaysImgPathRelative,
        ];

        $pdf['weeklyLNoHolidays'] = [
            'pdfExists' => $calendarWeeklyLNoHolidays,
            'imgExists' => $calendarWeeklyLNoHolidaysImg,
            'pdfPath' => $calendarWeeklyLNoHolidaysPath,
            'imgPath' => $calendarWeeklyLNoHolidaysImgPath,
            'pdfPathRelative' => $calendarWeeklyLNoHolidaysPathRelative,
            'imgPathRelative' => $calendarWeeklyLNoHolidaysImgPathRelative,
        ];

        $exists = 0;

        foreach ($pdf as $one) {
            if ($one['pdfExists'])
                $exists = 1;
        }

        return [
            'pdf' => $pdf,
            'exists' => $exists,
        ];

    }

}
