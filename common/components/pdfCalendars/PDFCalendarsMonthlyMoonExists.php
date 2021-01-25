<?php

namespace common\components\pdfCalendars;

class PDFCalendarsMonthlyMoonExists
{

    public function calendars($monthURL, $language)
    {



        $calendarMoonMonthlyPNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-P-' . $language . '.pdf');
        $calendarMoonMonthlyPNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-P-' . $language . '.jpg');
        $calendarMoonMonthlyPNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-P-' . $language . '.pdf';
        $calendarMoonMonthlyPNoHolidaysPathRelative = '/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-P-' . $language . '.pdf';
        $calendarMoonMonthlyPNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-P-' . $language . '.jpg';
        $calendarMoonMonthlyPNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-P-' . $language . '.jpg';

        $calendarMoonMonthlyLNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-L-' . $language . '.pdf');
        $calendarMoonMonthlyLNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-L-' . $language . '.jpg');
        $calendarMoonMonthlyLNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-L-' . $language . '.pdf';
        $calendarMoonMonthlyLNoHolidaysPathRelative = '/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-L-' . $language . '.pdf';
        $calendarMoonMonthlyLNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-L-' . $language . '.jpg';
        $calendarMoonMonthlyLNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/moon-months/calendar-moon-months-' . $monthURL['url'] . '-L-' . $language . '.jpg';



        $pdf['moonMonthlyPNoHolidays'] = [
            'pdfExists' => $calendarMoonMonthlyPNoHolidays,
            'imgExists' => $calendarMoonMonthlyPNoHolidaysImg,
            'pdfPath' => $calendarMoonMonthlyPNoHolidaysPath,
            'imgPath' => $calendarMoonMonthlyPNoHolidaysImgPath,
            'pdfPathRelative' => $calendarMoonMonthlyPNoHolidaysPathRelative,
            'imgPathRelative' => $calendarMoonMonthlyPNoHolidaysImgPathRelative,
        ];

        $pdf['moonMonthlyLNoHolidays'] = [
            'pdfExists' => $calendarMoonMonthlyLNoHolidays,
            'imgExists' => $calendarMoonMonthlyLNoHolidaysImg,
            'pdfPath' => $calendarMoonMonthlyLNoHolidaysPath,
            'imgPath' => $calendarMoonMonthlyLNoHolidaysImgPath,
            'pdfPathRelative' => $calendarMoonMonthlyLNoHolidaysPathRelative,
            'imgPathRelative' => $calendarMoonMonthlyLNoHolidaysImgPathRelative,
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
