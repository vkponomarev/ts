<?php

namespace common\components\pdfCalendars;

class PDFCalendarsYearlyExists
{

    public function calendars($year, $language, $countryURL)
    {

        $calendarYearlyP = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf');
        $calendarYearlyPPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyPPathRelative = '/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyPImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg');
        $calendarYearlyPImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg';
        $calendarYearlyPImgPathRelative = '/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg';

        $calendarYearlyL = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf');
        $calendarYearlyLImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg');
        $calendarYearlyLPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyLPathRelative = '/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarYearlyLImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg';
        $calendarYearlyLImgPathRelative = '/calendars-pdf/' . $countryURL . '/years/calendar-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg';

        $calendarYearlyPNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-P-' . $language . '.pdf');
        $calendarYearlyPNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-P-' . $language . '.jpg');
        $calendarYearlyPNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-P-' . $language . '.pdf';
        $calendarYearlyPNoHolidaysPathRelative = '/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-P-' . $language . '.pdf';
        $calendarYearlyPNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-P-' . $language . '.jpg';
        $calendarYearlyPNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-P-' . $language . '.jpg';

        $calendarYearlyLNoHolidays = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-L-' . $language . '.pdf');
        $calendarYearlyLNoHolidaysImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-L-' . $language . '.jpg');
        $calendarYearlyLNoHolidaysPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-L-' . $language . '.pdf';
        $calendarYearlyLNoHolidaysPathRelative = '/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-L-' . $language . '.pdf';
        $calendarYearlyLNoHolidaysImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-L-' . $language . '.jpg';
        $calendarYearlyLNoHolidaysImgPathRelative = '/calendars-pdf/no-holidays/years/calendar-yearly-' . $year . '-L-' . $language . '.jpg';


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
            'pdfExists' => $calendarYearlyP,
            'imgExists' => $calendarYearlyPImg,
            'pdfPath' => $calendarYearlyPPath,
            'imgPath' => $calendarYearlyPImgPath,
            'pdfPathRelative' => $calendarYearlyPPathRelative,
            'imgPathRelative' => $calendarYearlyPImgPathRelative,

        ];

        $pdf['PNoHolidays'] = [
            'pdfExists' => $calendarYearlyPNoHolidays,
            'imgExists' => $calendarYearlyPNoHolidaysImg,
            'pdfPath' => $calendarYearlyPNoHolidaysPath,
            'imgPath' => $calendarYearlyPNoHolidaysImgPath,
            'pdfPathRelative' => $calendarYearlyPNoHolidaysPathRelative,
            'imgPathRelative' => $calendarYearlyPNoHolidaysImgPathRelative,
        ];

        $pdf['L'] = [
            'pdfExists' => $calendarYearlyL,
            'imgExists' => $calendarYearlyLImg,
            'pdfPath' => $calendarYearlyLPath,
            'imgPath' => $calendarYearlyLImgPath,
            'pdfPathRelative' => $calendarYearlyLPathRelative,
            'imgPathRelative' => $calendarYearlyLImgPathRelative,
        ];

        $pdf['LNoHolidays'] = [
            'pdfExists' => $calendarYearlyLNoHolidays,
            'imgExists' => $calendarYearlyLNoHolidaysImg,
            'pdfPath' => $calendarYearlyLNoHolidaysPath,
            'imgPath' => $calendarYearlyLNoHolidaysImgPath,
            'pdfPathRelative' => $calendarYearlyLNoHolidaysPathRelative,
            'imgPathRelative' => $calendarYearlyLNoHolidaysImgPathRelative,
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
