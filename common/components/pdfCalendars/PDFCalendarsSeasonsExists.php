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


        $calendarYearlySeasonsP = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf');
        $calendarYearlySeasonsPPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlySeasonsPPathRelative = '/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlySeasonsPImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg');
        $calendarYearlySeasonsPImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg';
        $calendarYearlySeasonsPImgPathRelative = '/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg';

        $calendarYearlySeasonsL = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf');
        $calendarYearlySeasonsLImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg');
        $calendarYearlySeasonsLPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlySeasonsLPathRelative = '/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlySeasonsLImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg';
        $calendarYearlySeasonsLImgPathRelative = '/calendars-pdf/' . $countryURL . '/seasons/calendar-seasons-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg';

        $calendarYearlySeasonsPNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-P-' . $language . '.pdf');
        $calendarYearlySeasonsPNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-P-' . $language . '.jpg');
        $calendarYearlySeasonsPNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-P-' . $language . '.pdf';
        $calendarYearlySeasonsPNoHolidaysPathRelative = '/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-P-' . $language . '.pdf';
        $calendarYearlySeasonsPNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-P-' . $language . '.jpg';
        $calendarYearlySeasonsPNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-P-' . $language . '.jpg';

        $calendarYearlySeasonsLNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-L-' . $language . '.pdf');
        $calendarYearlySeasonsLNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-L-' . $language . '.jpg');
        $calendarYearlySeasonsLNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-L-' . $language . '.pdf';
        $calendarYearlySeasonsLNoHolidaysPathRelative = '/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-L-' . $language . '.pdf';
        $calendarYearlySeasonsLNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-L-' . $language . '.jpg';
        $calendarYearlySeasonsLNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/seasons/calendar-seasons-' . $year . '-L-' . $language . '.jpg';


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


        $pdf['seasonsP'] = [
            'pdfExists' => $calendarYearlySeasonsP,
            'imgExists' => $calendarYearlySeasonsPImg,
            'pdfPath' => $calendarYearlySeasonsPPath,
            'imgPath' => $calendarYearlySeasonsPImgPath,
            'pdfPathRelative' => $calendarYearlySeasonsPPathRelative,
            'imgPathRelative' => $calendarYearlySeasonsPImgPathRelative,

        ];

        $pdf['seasonsPNoHolidays'] = [
            'pdfExists' => $calendarYearlySeasonsPNoHolidays,
            'imgExists' => $calendarYearlySeasonsPNoHolidaysImg,
            'pdfPath' => $calendarYearlySeasonsPNoHolidaysPath,
            'imgPath' => $calendarYearlySeasonsPNoHolidaysImgPath,
            'pdfPathRelative' => $calendarYearlySeasonsPNoHolidaysPathRelative,
            'imgPathRelative' => $calendarYearlySeasonsPNoHolidaysImgPathRelative,
        ];

        $pdf['seasonsL'] = [
            'pdfExists' => $calendarYearlySeasonsL,
            'imgExists' => $calendarYearlySeasonsLImg,
            'pdfPath' => $calendarYearlySeasonsLPath,
            'imgPath' => $calendarYearlySeasonsLImgPath,
            'pdfPathRelative' => $calendarYearlySeasonsLPathRelative,
            'imgPathRelative' => $calendarYearlySeasonsLImgPathRelative,
        ];

        $pdf['seasonsLNoHolidays'] = [
            'pdfExists' => $calendarYearlySeasonsLNoHolidays,
            'imgExists' => $calendarYearlySeasonsLNoHolidaysImg,
            'pdfPath' => $calendarYearlySeasonsLNoHolidaysPath,
            'imgPath' => $calendarYearlySeasonsLNoHolidaysImgPath,
            'pdfPathRelative' => $calendarYearlySeasonsLNoHolidaysPathRelative,
            'imgPathRelative' => $calendarYearlySeasonsLNoHolidaysImgPathRelative,
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
