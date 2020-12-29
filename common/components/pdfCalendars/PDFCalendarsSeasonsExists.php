<?php

namespace common\components\pdfCalendars;

class PDFCalendarsSeasonsExists
{

    public function calendars($year, $language, $countryURL, $season)
    {

        $calendarP = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf');
        $calendarPPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarPPathRelative = '/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf';

        $calendarPImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg');
        $calendarPImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg';
        $calendarPImgPathRelative = '/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg';

        $calendarL = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf');
        $calendarLImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg');
        $calendarLPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarLPathRelative = '/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarLImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg';
        $calendarLImgPathRelative = '/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg';



        $calendarPNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '.pdf');
        $calendarPNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '.jpg');
        $calendarPNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '.pdf';
        $calendarPNoHolidaysPathRelative = '/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '.pdf';
        $calendarPNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '.jpg';
        $calendarPNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-P-' . $language . '.jpg';

        $calendarLNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '.pdf');
        $calendarLNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '.jpg');
        $calendarLNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '.pdf';
        $calendarLNoHolidaysPathRelative = '/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '.pdf';
        $calendarLNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '.jpg';
        $calendarLNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $season . '-' . $year . '-L-' . $language . '.jpg';

        $pdf['P'] = [
            'pdfExists' => $calendarP,
            'imgExists' => $calendarPImg,
            'pdfPath' => $calendarPPath,
            'imgPath' => $calendarPImgPath,
            'pdfPathRelative' => $calendarPPathRelative,
            'imgPathRelative' => $calendarPImgPathRelative,

        ];

        $pdf['PNoHolidays'] = [
            'pdfExists' => $calendarPNoHolidays,
            'imgExists' => $calendarPNoHolidaysImg,
            'pdfPath' => $calendarPNoHolidaysPath,
            'imgPath' => $calendarPNoHolidaysImgPath,
            'pdfPathRelative' => $calendarPNoHolidaysPathRelative,
            'imgPathRelative' => $calendarPNoHolidaysImgPathRelative,
        ];

        $pdf['L'] = [
            'pdfExists' => $calendarL,
            'imgExists' => $calendarLImg,
            'pdfPath' => $calendarLPath,
            'imgPath' => $calendarLImgPath,
            'pdfPathRelative' => $calendarLPathRelative,
            'imgPathRelative' => $calendarLImgPathRelative,
        ];

        $pdf['LNoHolidays'] = [
            'pdfExists' => $calendarLNoHolidays,
            'imgExists' => $calendarLNoHolidaysImg,
            'pdfPath' => $calendarLNoHolidaysPath,
            'imgPath' => $calendarLNoHolidaysImgPath,
            'pdfPathRelative' => $calendarLNoHolidaysPathRelative,
            'imgPathRelative' => $calendarLNoHolidaysImgPathRelative,
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
