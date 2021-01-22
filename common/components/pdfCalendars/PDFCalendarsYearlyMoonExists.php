<?php

namespace common\components\pdfCalendars;

class PDFCalendarsYearlyMoonExists
{

    public function calendars($year, $language)
    {


        $calendarMoonYearlyPNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-P-' . $language . '.pdf');
        $calendarMoonYearlyPNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-P-' . $language . '.jpg');
        $calendarMoonYearlyPNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-P-' . $language . '.pdf';
        $calendarMoonYearlyPNoHolidaysPathRelative = '/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-P-' . $language . '.pdf';
        $calendarMoonYearlyPNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-P-' . $language . '.jpg';
        $calendarMoonYearlyPNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-P-' . $language . '.jpg';

        $calendarMoonYearlyLNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-L-' . $language . '.pdf');
        $calendarMoonYearlyLNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-L-' . $language . '.jpg');
        $calendarMoonYearlyLNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-L-' . $language . '.pdf';
        $calendarMoonYearlyLNoHolidaysPathRelative = '/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-L-' . $language . '.pdf';
        $calendarMoonYearlyLNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-L-' . $language . '.jpg';
        $calendarMoonYearlyLNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/moon-years/calendar-moon-yearly-' . $year . '-L-' . $language . '.jpg';

        $pdf['moonPNoHolidays'] = [
            'pdfExists' => $calendarMoonYearlyPNoHolidays,
            'imgExists' => $calendarMoonYearlyPNoHolidaysImg,
            'pdfPath' => $calendarMoonYearlyPNoHolidaysPath,
            'imgPath' => $calendarMoonYearlyPNoHolidaysImgPath,
            'pdfPathRelative' => $calendarMoonYearlyPNoHolidaysPathRelative,
            'imgPathRelative' => $calendarMoonYearlyPNoHolidaysImgPathRelative,
        ];

        $pdf['moonLNoHolidays'] = [
            'pdfExists' => $calendarMoonYearlyLNoHolidays,
            'imgExists' => $calendarMoonYearlyLNoHolidaysImg,
            'pdfPath' => $calendarMoonYearlyLNoHolidaysPath,
            'imgPath' => $calendarMoonYearlyLNoHolidaysImgPath,
            'pdfPathRelative' => $calendarMoonYearlyLNoHolidaysPathRelative,
            'imgPathRelative' => $calendarMoonYearlyLNoHolidaysImgPathRelative,
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
