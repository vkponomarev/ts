<?php

namespace common\components\pdfCalendars;

class PDFCalendarsBusinessYearlyExists
{

    public function calendars($year, $language, $countryURL)
    {

        $calendarBusinessYearlyP = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf');
        $calendarBusinessYearlyPPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarBusinessYearlyPPathRelative = '/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.pdf';
        $calendarBusinessYearlyPImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg');
        $calendarBusinessYearlyPImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg';
        $calendarBusinessYearlyPImgPathRelative = '/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-P-' . $language . '-' . $countryURL . '.jpg';

        $calendarBusinessYearlyL = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf');
        $calendarBusinessYearlyLImg = file_exists(\Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg');
        $calendarBusinessYearlyLPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarBusinessYearlyLPathRelative = '/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.pdf';
        $calendarBusinessYearlyLImgPath = \Yii::getAlias('@frontend') . '/web/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg';
        $calendarBusinessYearlyLImgPathRelative = '/calendars-pdf/' . $countryURL . '/business-years/calendar-business-yearly-' . $year . '-L-' . $language . '-' . $countryURL . '.jpg';

        $pdf['businessYearlyP'] = [
            'pdfExists' => $calendarBusinessYearlyP,
            'imgExists' => $calendarBusinessYearlyPImg,
            'pdfPath' => $calendarBusinessYearlyPPath,
            'imgPath' => $calendarBusinessYearlyPImgPath,
            'pdfPathRelative' => $calendarBusinessYearlyPPathRelative,
            'imgPathRelative' => $calendarBusinessYearlyPImgPathRelative,

        ];

        $pdf['businessYearlyL'] = [
            'pdfExists' => $calendarBusinessYearlyL,
            'imgExists' => $calendarBusinessYearlyLImg,
            'pdfPath' => $calendarBusinessYearlyLPath,
            'imgPath' => $calendarBusinessYearlyLImgPath,
            'pdfPathRelative' => $calendarBusinessYearlyLPathRelative,
            'imgPathRelative' => $calendarBusinessYearlyLImgPathRelative,
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
