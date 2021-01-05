<?php

namespace common\components\pdfCalendars;

class PDFCalendarsMonthlyExists
{

    public function calendars($monthURL, $language, $countryURL)
    {

        $calendarMonthlyP = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '-' . $countryURL . '.pdf');
        $calendarMonthlyPPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarMonthlyPPathRelative = '/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarMonthlyPImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '-' . $countryURL . '.jpg');
        $calendarMonthlyPImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '-' . $countryURL . '.jpg';
        $calendarMonthlyPImgPathRelative = '/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '-' . $countryURL . '.jpg';

        $calendarMonthlyL = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '-' . $countryURL . '.pdf');
        $calendarMonthlyLImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '-' . $countryURL . '.jpg');
        $calendarMonthlyLPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarMonthlyLPathRelative = '/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarMonthlyLImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '-' . $countryURL . '.jpg';
        $calendarMonthlyLImgPathRelative = '/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '-' . $countryURL . '.jpg';

        $calendarMonthlyPNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '.pdf');
        $calendarMonthlyPNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '.jpg');
        $calendarMonthlyPNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '.pdf';
        $calendarMonthlyPNoHolidaysPathRelative = '/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '.pdf';
        $calendarMonthlyPNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '.jpg';
        $calendarMonthlyPNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-P-' . $language . '.jpg';

        $calendarMonthlyLNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '.pdf');
        $calendarMonthlyLNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '.jpg');
        $calendarMonthlyLNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '.pdf';
        $calendarMonthlyLNoHolidaysPathRelative = '/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '.pdf';
        $calendarMonthlyLNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '.jpg';
        $calendarMonthlyLNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['url'] . '-L-' . $language . '.jpg';



        $calendarYearlyMonthlyP = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '-' . $countryURL . '.pdf');
        $calendarYearlyMonthlyPPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyMonthlyPPathRelative = '/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyMonthlyPImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '-' . $countryURL . '.jpg');
        $calendarYearlyMonthlyPImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '-' . $countryURL . '.jpg';
        $calendarYearlyMonthlyPImgPathRelative = '/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '-' . $countryURL . '.jpg';

        $calendarYearlyMonthlyL = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '-' . $countryURL . '.pdf');
        $calendarYearlyMonthlyLImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '-' . $countryURL . '.jpg');
        $calendarYearlyMonthlyLPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyMonthlyLPathRelative = '/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyMonthlyLImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '-' . $countryURL . '.jpg';
        $calendarYearlyMonthlyLImgPathRelative = '/calendars-pdf/' . $countryURL . '/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '-' . $countryURL . '.jpg';

        $calendarYearlyMonthlyPNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '.pdf');
        $calendarYearlyMonthlyPNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '.jpg');
        $calendarYearlyMonthlyPNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '.pdf';
        $calendarYearlyMonthlyPNoHolidaysPathRelative = '/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '.pdf';
        $calendarYearlyMonthlyPNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '.jpg';
        $calendarYearlyMonthlyPNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-P-' . $language . '.jpg';

        $calendarYearlyMonthlyLNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '.pdf');
        $calendarYearlyMonthlyLNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '.jpg');
        $calendarYearlyMonthlyLNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '.pdf';
        $calendarYearlyMonthlyLNoHolidaysPathRelative = '/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '.pdf';
        $calendarYearlyMonthlyLNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '.jpg';
        $calendarYearlyMonthlyLNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/months/calendar-months-' . $monthURL['year'] . '-L-' . $language . '.jpg';

        $pdf['P'] = [
            'pdfExists' => $calendarMonthlyP,
            'imgExists' => $calendarMonthlyPImg,
            'pdfPath' => $calendarMonthlyPPath,
            'imgPath' => $calendarMonthlyPImgPath,
            'pdfPathRelative' => $calendarMonthlyPPathRelative,
            'imgPathRelative' => $calendarMonthlyPImgPathRelative,

        ];

        $pdf['PNoHolidays'] = [
            'pdfExists' => $calendarMonthlyPNoHolidays,
            'imgExists' => $calendarMonthlyPNoHolidaysImg,
            'pdfPath' => $calendarMonthlyPNoHolidaysPath,
            'imgPath' => $calendarMonthlyPNoHolidaysImgPath,
            'pdfPathRelative' => $calendarMonthlyPNoHolidaysPathRelative,
            'imgPathRelative' => $calendarMonthlyPNoHolidaysImgPathRelative,
        ];

        $pdf['L'] = [
            'pdfExists' => $calendarMonthlyL,
            'imgExists' => $calendarMonthlyLImg,
            'pdfPath' => $calendarMonthlyLPath,
            'imgPath' => $calendarMonthlyLImgPath,
            'pdfPathRelative' => $calendarMonthlyLPathRelative,
            'imgPathRelative' => $calendarMonthlyLImgPathRelative,
        ];

        $pdf['LNoHolidays'] = [
            'pdfExists' => $calendarMonthlyLNoHolidays,
            'imgExists' => $calendarMonthlyLNoHolidaysImg,
            'pdfPath' => $calendarMonthlyLNoHolidaysPath,
            'imgPath' => $calendarMonthlyLNoHolidaysImgPath,
            'pdfPathRelative' => $calendarMonthlyLNoHolidaysPathRelative,
            'imgPathRelative' => $calendarMonthlyLNoHolidaysImgPathRelative,
        ];


        $pdf['yearlyP'] = [
            'pdfExists' => $calendarYearlyMonthlyP,
            'imgExists' => $calendarYearlyMonthlyPImg,
            'pdfPath' => $calendarYearlyMonthlyPPath,
            'imgPath' => $calendarYearlyMonthlyPImgPath,
            'pdfPathRelative' => $calendarYearlyMonthlyPPathRelative,
            'imgPathRelative' => $calendarYearlyMonthlyPImgPathRelative,

        ];

        $pdf['yearlyPNoHolidays'] = [
            'pdfExists' => $calendarYearlyMonthlyPNoHolidays,
            'imgExists' => $calendarYearlyMonthlyPNoHolidaysImg,
            'pdfPath' => $calendarYearlyMonthlyPNoHolidaysPath,
            'imgPath' => $calendarYearlyMonthlyPNoHolidaysImgPath,
            'pdfPathRelative' => $calendarYearlyMonthlyPNoHolidaysPathRelative,
            'imgPathRelative' => $calendarYearlyMonthlyPNoHolidaysImgPathRelative,
        ];

        $pdf['yearlyL'] = [
            'pdfExists' => $calendarYearlyMonthlyL,
            'imgExists' => $calendarYearlyMonthlyLImg,
            'pdfPath' => $calendarYearlyMonthlyLPath,
            'imgPath' => $calendarYearlyMonthlyLImgPath,
            'pdfPathRelative' => $calendarYearlyMonthlyLPathRelative,
            'imgPathRelative' => $calendarYearlyMonthlyLImgPathRelative,
        ];

        $pdf['yearlyLNoHolidays'] = [
            'pdfExists' => $calendarYearlyMonthlyLNoHolidays,
            'imgExists' => $calendarYearlyMonthlyLNoHolidaysImg,
            'pdfPath' => $calendarYearlyMonthlyLNoHolidaysPath,
            'imgPath' => $calendarYearlyMonthlyLNoHolidaysImgPath,
            'pdfPathRelative' => $calendarYearlyMonthlyLNoHolidaysPathRelative,
            'imgPathRelative' => $calendarYearlyMonthlyLNoHolidaysImgPathRelative,
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
