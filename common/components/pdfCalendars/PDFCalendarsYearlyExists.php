<?php

namespace common\components\pdfCalendars;

class PDFCalendarsYearlyExists
{

    public function calendars($year, $language, $countryURL)
    {

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



        $calendarYearlyPNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-P-' . $language . '.pdf');
        $calendarYearlyPNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-P-' . $language . '.jpg');
        $calendarYearlyPNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-P-' . $language . '.pdf';
        $calendarYearlyPNoHolidaysPathRelative = '/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-P-' . $language . '.pdf';
        $calendarYearlyPNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-P-' . $language . '.jpg';
        $calendarYearlyPNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-P-' . $language . '.jpg';

        $calendarYearlyLNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-L-' . $language . '.pdf');
        $calendarYearlyLNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-L-' . $language . '.jpg');
        $calendarYearlyLNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-L-' . $language . '.pdf';
        $calendarYearlyLNoHolidaysPathRelative = '/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-L-' . $language . '.pdf';
        $calendarYearlyLNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-L-' . $language . '.jpg';
        $calendarYearlyLNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/calendar-yearly-' . $year . '-L-' . $language . '.jpg';

        $pdf['P'] = [
            'pdfExists' => $calendarYearlyP,
            'imgExists' => $calendarYearlyPImg,
            'pdfPath' => $calendarYearlyPPath,
            'imgPath' => $calendarYearlyPImgPath,
            'pdfPathRelative' => $calendarYearlyPPathRelative,
            'imgPathRelative' => $calendarYearlyPImgPathRelative,

        ];

        $pdf['L'] = [
            'pdfExists' => $calendarYearlyL,
            'imgExists' => $calendarYearlyLImg,
            'pdfPath' => $calendarYearlyLPath,
            'imgPath' => $calendarYearlyLImgPath,
            'pdfPathRelative' => $calendarYearlyLPathRelative,
            'imgPathRelative' => $calendarYearlyLImgPathRelative,
        ];

        $pdf['PNoHolidays'] = [
            'pdfExists' => $calendarYearlyPNoHolidays,
            'imgExists' => $calendarYearlyPNoHolidaysImg,
            'pdfPath' => $calendarYearlyPNoHolidaysPath,
            'imgPath' => $calendarYearlyPNoHolidaysImgPath,
            'pdfPathRelative' => $calendarYearlyPNoHolidaysPathRelative,
            'imgPathRelative' => $calendarYearlyPNoHolidaysImgPathRelative,
        ];

        $pdf['LNoHolidays'] = [
            'pdfExists' => $calendarYearlyLNoHolidays,
            'imgExists' => $calendarYearlyLNoHolidaysImg,
            'pdfPath' => $calendarYearlyLNoHolidaysPath,
            'imgPath' => $calendarYearlyLNoHolidaysImgPath,
            'pdfPathRelative' => $calendarYearlyLNoHolidaysPathRelative,
            'imgPathRelative' => $calendarYearlyLNoHolidaysImgPathRelative,
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
