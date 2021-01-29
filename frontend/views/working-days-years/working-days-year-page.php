<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $dateData common\components\date\DateData
 * @var $countriesData common\components\countries\CountriesData
 * @var $holidaysData common\components\holidays\HolidaysByCountryByYear array
 * @var $holidaysTypesData common\components\holidaysTypes\HolidaysTypesData
 * @var $countryData common\components\country\CountryData
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths
 * @var $calendarNameOfDaysInWeek common\components\calendar\CalendarNameOfDaysInWeek
 * @var $PDFCalendarsData common\components\PDFCalendars\PDFCalendarsYearlyExists
 * @var $getParamsByCalendarYears common\components\getParams\GetParamsByCalendarYears
 * @var $holidaysRange common\components\holidays\HolidaysRange
 */


?>


<a name="calendar-<?= $dateData['year']['current'] ?>"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<div class="row">
    <?php /***************************** */ ?>
    <?php /***************************** Сегодняшний год*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 current-date">
        <div class="current-date-div">
            <div class="current-date-one">
                <div class="current-date-year">
                    <?= $dateData['year']['current'] ?>
                    <br>
                    <span class="current-date-month">
                    <?= Yii::t('app', 'year'); ?>
                </span>

                </div>
            </div>
            <div class="current-date-text">

                <?= Yii::$app->params['text']['text1'] ?>
            </div>
        </div>
    </div>
    <?php /***************************** */ ?>
    <?php /***************************** Выберите страну*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 c-links-mp">
        <?php if ($dateData['year']['current'] >= 2000 && $dateData['year']['current'] <= 2030): ?>
            <div class="c-links-block c-links-mp-header c-links-mp-header-link">
                <?= Yii::t('app', 'Choose the country'); ?>
            </div>
            <div class="c-links-block">
                <form method="get" id="form">
                    <div class="form-group">
                        <script>
                            let url = '<?php echo \yii\helpers\Url::home(true) . Yii::$app->language . '/calendar/working/years/' . $dateData['year']['current'] . '/';?>';
                        </script>
                        <select id="selectCountry" class="form-control">
                            <option><?= $countryData['name'] ?></option>
                            <?php foreach ($countriesData as $country) : ?>
                                <option value="<?= $country['url'] ?>"><?= $country['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="c-links-block">
                <hr>
            </div>
        <?php endif; ?>
        <div class="c-links-block c-links-mp-header c-links-mp-header-link">
            <?= Yii::t('app', 'Quarters of the year'); ?>
        </div>
        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/business/quarters/<?= $dateData['year']['current'] ?>/1/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>">
                    <?= '1 ' . Yii::t('app', 'quarter') ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/quarters/<?= $dateData['year']['current'] ?>/2/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>">
                    <?= '2 ' . Yii::t('app', 'quarter') ?>
                </a>
                <br>
            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/business/quarters/<?= $dateData['year']['current'] ?>/3/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>">
                    <?= '3 ' . Yii::t('app', 'quarter') ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/quarters/<?= $dateData['year']['current'] ?>/4/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>">
                    <?= '4 ' . Yii::t('app', 'quarter') ?>
                </a>
                <br>

            </div>
        </div>
        <div class="c-links-block">
            <hr class="hr-1">
        </div>
    </div>
</div>
<br><br>
<hr>

<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с годами туда сюда*/ ?>
<?php /***************************** */ ?>


<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($dateData['year']['previous'] == $holidaysRange['start'] - 1): ?>
        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/working/years/<?= $dateData['year']['previous'] ?>/
            <?= (($countryURL['url'] <> '')
                && ($dateData['year']['previous'] >= $holidaysRange['start'] && $dateData['year']['previous'] <= $holidaysRange['end']))
                ? $countryURL['url'] . '/' : '' ?>">
                <?= $dateData['year']['previous'] ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">
        <?= $dateData['year']['current'] ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($dateData['year']['current'] == $holidaysRange['end']): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/working/years/<?= $dateData['year']['next'] ?>/
            <?= (($countryURL['url'] <> '')
                && ($dateData['year']['next'] >= $holidaysRange['start'] && $dateData['year']['next'] <= $holidaysRange['end']))
                ? $countryURL['url'] . '/' : '' ?>">
                <?= $dateData['year']['next'] ?>
            </a>
        <?php endif; ?>
    </div>
</div>
<hr>
<?php if ($PDFCalendarsData['exists']): ?>
    <div class="row">
        <div class="col-xxs-12 c-prev-next-right">
            <a href="#download-calendar-<?= $dateData['year']['current'] ?>" class="btn btn-default">
                <span class="fa fa-print fa-lg"></span>&nbsp;<?= Yii::t('app', 'Print'); ?>
            </a>
        </div>
    </div>
    <br>
<?php endif; ?>


<?php /***************************** */ ?>
<?php /***************************** Календарь с отмеченными праздниками конкретнрой страны*/ ?>
<?php /***************************** */ ?>


<div class="row rflex year">
    <?php
    $countMonths = 0;
    $countWeeks = 0;
    foreach ($calendarByYear['calendar'] as $months) : ?>


        <?php $countMonths++; ?>
        <div class="month col-xxs-12 col-xs-6 col-sm-4 col-md-3">

            <div class="month-name">
            <span class="fa fa-calendar">
                </span>
                <a href="/<?= Yii::$app->language ?>/calendar/working/months/<?= $dateData['year']['current'] ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/
                    <?= (($countryURL['url'] <> '')
                    && ($dateData['year']['next'] >= $holidaysRange['start'] && $dateData['year']['next'] <= $holidaysRange['end']))
                    ? $countryURL['url'] . '/' : '' ?>">
                    <?= $calendarNameOfMonths[$countMonths]; ?>
                </a>

            </div>

            <div class="week-name">
                <div class="wday-name">
                    #
                </div>
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <div class="day-name">
                        <?= $calendarNameOfDaysInWeek[$i]; ?>
                    </div>
                <?php endfor; ?>
            </div>

            <?php $countWeeks = 0; ?>
            <?php foreach ($months as $key => $week): ?>
                <?php $countWeeks++ ?>
                <div class="week">
                    <div class="wno-day">
                            <span>
                                <?php if ($countWeeks == 1 && $key > 50): ?>
                                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['previous'] ?>/<?= $key; ?>/">
                                        <?= $key; ?>
                                    </a>
                                <?php else: ?>
                                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['current'] ?>/<?= $key; ?>/">
                                        <?= $key; ?>
                                    </a>
                                <?php endif; ?>
                            </span>
                    </div>
                    <?php for ($i = 1; $i <= 5; $i++): ?>

                        <?php if (isset($week[$i]['monthDay'])): ?>

                            <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                            if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?>
                                <div class="day-holiday" data-title="<?= $holidaysData[$key]['name'] ?>">
                                     <span>
                                    <?= $week[$i]['monthDay']; ?>
                                     </span>
                                </div>
                            <?php else: ?>
                                <div class="day">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                        <?php else: ?>
                            <div class="no-day">
                            <span>

                            </span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php for ($i = 6; $i <= 7; $i++): ?>
                        <?php if (isset($week[$i]['monthDay'])): ?>
                            <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                            if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?>
                                <div class="day-holiday" data-title="<?= $holidaysData[$key]['name'] ?>">
                                     <span>
                                    <?= $week[$i]['monthDay']; ?>
                                     </span>
                                </div>
                            <?php else: ?>
                                <div class="day-off">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="no-day">
                            <span>

                            </span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                </div>
            <?php endforeach; ?>
            <?php if ($countWeeks <> 6) : ?>
                <?php foreach (range(1, 6 - $countWeeks) as $addWeek): ?>
                    <div class="week">
                        <?php foreach (range(1, 7) as $oneDay): ?>
                            <div class="no-day">
                            <span>
                            &nbsp;
                            </span>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>
            <?php endif; ?>
            <br>
            <table class="business-table">
                <tr class="business-gray">
                    <td class="business-left">
                        <?= Yii::t('app', 'Calendar days') ?>
                    </td>
                    <td class="business-right">
                        <?= $calendarByYear['daysInMonth'][$countMonths] ?>
                    </td>
                </tr>
                <tr class="business-light">
                    <td class="business-left">
                        <?= Yii::t('app', 'Working days') ?>
                    </td>
                    <td class="business-right">
                        <?= $calendarByYear['workingDays'][$countMonths] ?>
                    </td>
                </tr>
                <tr class="business-gray">
                    <td class="business-left">
                        <?= Yii::t('app', 'Days off') ?>
                    </td>
                    <td class="business-right">
                        <?= $calendarByYear['allHolidays'][$countMonths] ?>
                    </td>
                </tr>
                <tr class="business-ligh">
                    <td class="business-left">
                        <?= Yii::t('app', '40 hour week') ?>
                    </td>
                    <td class="business-right">
                        <?= $calendarByYear['hours40'][$countMonths] ?>
                    </td>
                </tr>
                <tr class="business-gray">
                    <td class="business-left">
                        <?= Yii::t('app', '36 hour week') ?>
                    </td>
                    <td class="business-right">
                        <?= $calendarByYear['hours36'][$countMonths] ?>
                    </td>
                </tr>
                <tr class="business-ligh">
                    <td class="business-left">
                        <?= Yii::t('app', '24 hour week') ?>
                    </td>
                    <td class="business-right">
                        <?= $calendarByYear['hours24'][$countMonths] ?>
                    </td>
                </tr>
            </table>
            <br>
        </div>
    <?php endforeach; ?>
</div>
<br>
<hr>
<br>

<?php $quarters = [
          '1' => ['name' => '1 ' . Yii::t('app', 'quarter'),
        'var' => $calendarByYear['quarter'][1]],
    '2' => ['name' => '2 ' . Yii::t('app', 'quarter'),
        'var' => $calendarByYear['quarter'][2]],
    '3' => ['name' => '1 ' . Yii::t('app', 'half year'),
        'var' => $calendarByYear['halfYear'][1]],
    '4' => ['name' => '3 ' . Yii::t('app', 'quarter'),
        'var' => $calendarByYear['quarter'][3]],
    '5' => ['name' => '4 ' . Yii::t('app', 'quarter'),
        'var' => $calendarByYear['quarter'][4]],
    '6' => ['name' => '2 ' . Yii::t('app', 'half year'),
        'var' => $calendarByYear['halfYear'][2]],
    '7' => ['name' => '1 ' . Yii::t('app', 'year'),
        'var' => $calendarByYear['businessYear'][$dateData['year']['current']]],
]
?>
<div class="row rflex">

    <?php foreach ($quarters as $one): ?>
        <div class="col-xxs-12 col-xs-6 col-sm-3">
            <h2><?= $one['name'] ?></h2>
            <table class="business-table">
                <tr class="business-gray">
                    <td class="business-left">
                        <?= Yii::t('app', 'Calendar days') ?>
                    </td>
                    <td class="business-right">
                        <?= $one['var']['days'] ?>
                    </td>
                </tr>
                <tr class="business-light">
                    <td class="business-left">
                        <?= Yii::t('app', 'Working days') ?>
                    </td>
                    <td class="business-right">
                        <?= $one['var']['workingDays'] ?>
                    </td>
                </tr>
                <tr class="business-gray">
                    <td class="business-left">
                        <?= Yii::t('app', 'Days off') ?>
                    </td>
                    <td class="business-right">
                        <?= $one['var']['allHolidays'] ?>
                    </td>
                </tr>
                <tr class="business-ligh">
                    <td class="business-left">
                        <?= Yii::t('app', '40 hour week') ?>
                    </td>
                    <td class="business-right">
                        <?= $one['var']['hours40'] ?>
                    </td>
                </tr>
                <tr class="business-gray">
                    <td class="business-left">
                        <?= Yii::t('app', '36 hour week') ?>
                    </td>
                    <td class="business-right">
                        <?= $one['var']['hours36'] ?>
                    </td>
                </tr>
                <tr class="business-ligh">
                    <td class="business-left">
                        <?= Yii::t('app', '24 hour week') ?>
                    </td>
                    <td class="business-right">
                        <?= $one['var']['hours24'] ?>
                    </td>
                </tr>
            </table>
        </div>
    <?php endforeach ?>
</div>

<br>
<hr>
<br>

<?php /***************************** */ ?>
<?php /***************************** Список всех праздников конкретной страны*/ ?>
<?php /***************************** */ ?>


<?php if ($holidaysData): ?>
    <a name="business-days-calendar-of-holidays-and-weekends-in-<?= $dateData['year']['current'] ?>-<?= $countryData['name_en'] ?>"></a>
    <h2 class="main-page-h1">
        <?= Yii::t('app', 'Working days calendar for {year} {country_for}', [
            'country_for' => $countryData['name_for'],
            'year' => $dateData['year']['current'],
        ]) ?>
    </h2>

    <br><br>
    <div class="row rflex">

        <?php foreach ($holidaysData as $holiday) : ?>
            <?php $dateFormat = new \DateTime($holiday['date']) ?>
            <div class="col-xxs-12 col-xs-6 col-md-4 holidays-names-line">

                <div class="holidays-color-square-<?= $holiday['holiday'] == 1 ? 'green' : 'gray' ?>">
                </div>
                <?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                &nbsp;
                <?= $holiday['name']; ?>
                <?php //(new \common\components\dump\Dump())->printR($holiday['holiday_types']);?>

            </div>
        <?php endforeach; ?>
    </div>
    <br>
    <hr>
<?php endif; ?>

<?php /***************************** */ ?>
<?php /***************************** Ссылки на PDF календари*/ ?>
<?php /***************************** */ ?>


<?php if ($PDFCalendarsData['exists']): ?>
    <br>

    <a name="download-calendar-<?= $dateData['year']['current'] ?>"></a>
    <h2 class="main-page-h1">
        <?= Yii::t('app', 'Download and print PDF working days calendar for {year} {country_for}', [
            'country_for' => $countryData['name_for'],
            'year' => $dateData['year']['current'],
        ]) ?>
    </h2>

    <br><br>

    <div class="row rflex">
        <?php foreach ($PDFCalendarsData['pdf'] as $key => $pdf): ?>
            <?php if ($pdf['pdfExists']): ?>
                <div class="col-xxs-12 col-xs-6 col-md-4 col-lg-3 d-center pdf-download">
                    <?php if ($key == 'businessYearlyP'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Portrait working days calendar for the year') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'businessYearlyL'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Landscape working days calendar for the year') ?></div>
                    <?php endif; ?>

                    <a href="<?= $pdf['imgPathRelative'] ?>" class="lightzoom">
                        <img class="c-download-img " alt="" src="<?= $pdf['imgPathRelative'] ?>" width="100%">
                    </a>

                    <a href="<?= $pdf['pdfPathRelative'] ?>" download class="btn btn-success c-download-button"
                       target="_blank">
                        <?= Yii::t('app', 'Download') ?>
                    </a>
                    <br>
                    <a href="<?= $pdf['pdfPathRelative'] ?>" class="btn btn-success c-download-button"
                       target="_blank">
                        <?= Yii::t('app', 'Print') ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php else: ?>
<?php endif; ?>



