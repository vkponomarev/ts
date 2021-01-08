<?php

namespace common\components\pdfCalendars;

class PDFCalendarsYearlyWithWeeksExists
{

    public function calendars($year, $language, $countryURL)
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
        $calendarYearlyWithWeeksPNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-P-' . $language . '.pdf');
        $calendarYearlyWithWeeksPNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-P-' . $language . '.jpg');
        $calendarYearlyWithWeeksPNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-P-' . $language . '.pdf';
        $calendarYearlyWithWeeksPNoHolidaysPathRelative = '/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-P-' . $language . '.pdf';
        $calendarYearlyWithWeeksPNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-P-' . $language . '.jpg';
        $calendarYearlyWithWeeksPNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-P-' . $language . '.jpg';

        $calendarYearlyWithWeeksLNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-L-' . $language . '.pdf');
        $calendarYearlyWithWeeksLNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-L-' . $language . '.jpg');
        $calendarYearlyWithWeeksLNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-L-' . $language . '.pdf';
        $calendarYearlyWithWeeksLNoHolidaysPathRelative = '/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-L-' . $language . '.pdf';
        $calendarYearlyWithWeeksLNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-L-' . $language . '.jpg';
        $calendarYearlyWithWeeksLNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/years-with-weeks/calendar-yearly-with-weeks-' . $year . '-L-' . $language . '.jpg';

        $pdf['yearlyWithWeeksPNoHolidays'] = [
            'pdfExists' => $calendarYearlyWithWeeksPNoHolidays,
            'imgExists' => $calendarYearlyWithWeeksPNoHolidaysImg,
            'pdfPath' => $calendarYearlyWithWeeksPNoHolidaysPath,
            'imgPath' => $calendarYearlyWithWeeksPNoHolidaysImgPath,
            'pdfPathRelative' => $calendarYearlyWithWeeksPNoHolidaysPathRelative,
            'imgPathRelative' => $calendarYearlyWithWeeksPNoHolidaysImgPathRelative,
        ];

        $pdf['yearlyWithWeeksLNoHolidays'] = [
            'pdfExists' => $calendarYearlyWithWeeksLNoHolidays,
            'imgExists' => $calendarYearlyWithWeeksLNoHolidaysImg,
            'pdfPath' => $calendarYearlyWithWeeksLNoHolidaysPath,
            'imgPath' => $calendarYearlyWithWeeksLNoHolidaysImgPath,
            'pdfPathRelative' => $calendarYearlyWithWeeksLNoHolidaysPathRelative,
            'imgPathRelative' => $calendarYearlyWithWeeksLNoHolidaysImgPathRelative,
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
