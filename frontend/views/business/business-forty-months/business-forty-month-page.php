<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByMonth common\components\calendar\CalendarByMonth
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
 * @var $countryURL array ['url','id','defaultID']
 *
 *
 */


?>


<a name="calendar-<?= $dateData['year']['current'] ?>"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<div class="row">
    <?php /** Сегодняшний месяц */ ?>
    <div class="col-xxs-12 col-xs-6 current-date">
        <div class="current-date-div">
            <div class="current-date-one">
                <div class="current-date-year">
                    <?= $calendarNameOfMonths[$dateData['month']['numberSimple']] ?>

                    <br>
                    <span class="current-date-month">
                    <?= $dateData['year']['current'] ?>&nbsp;<?= Yii::t('app', 'year'); ?>
                </span>

                </div>
            </div>
            <div class="current-date-text">

                <?= Yii::$app->params['text']['text1'] ?>
            </div>
        </div>
    </div>

    <?php /***************************** */ ?>
    <?php /***************************** Ссылки на основной календарь*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 plates">
        <div class="plate">
            <div class="plate-header">
                <?php if ($countryURL['url'] <> '') : ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/years/<?= $dateData['year']['current'] ?>/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>">
                        <?= Yii::t('app', '40 hour work week'); ?>
                    </a>
                <?php else: ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/years/<?= $dateData['year']['current'] ?>/">
                        <?= Yii::t('app', '40 hour work week'); ?>
                    </a>
                <?php endif; ?>
                <?= ' / ' ?>
                <a href="/<?= Yii::$app->language ?>/calendar/days/today/">
                    <?= Yii::t('app', 'Today') ?>
                </a>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-01/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[1] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-02/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-03/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-04/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-05/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-06/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-07/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-08/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-09/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-10/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-11/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-12/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[12] ?></a><br>
                </div>
            </div>
            <div class="plate-links">
                <hr>
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
                <hr>
            </div>
            <?php if ($dateData['year']['current'] >= 2000 && $dateData['year']['current'] <= 2030): ?>
                <div class="plate-links">
                    <form method="get" id="form">
                        <div class="form-group">
                            <script>
                                let url = '<?php echo \yii\helpers\Url::home(true) . Yii::$app->language . '/calendar/business/forty/months/' . $dateData['year']['current'] . '-' . $dateData['month']['number'] . '/';?>';
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

            <?php endif; ?>

        </div>
    </div>

</div>
<div class="row rflex">
    <div class="col-xxs-12 plates">
        <div class="plate-long">
            <?php $linksCount = 0 ?>
            <?php foreach ($calendars->links as $link): ?>
                <?php $linksCount++ ?>
                <a class="plate-a-margin" href="<?= $link['url'] ?>">
                    <?= $link['name'] ?>
                </a>
                <?php if ($linksCount == count($calendars->links)) : ?>
                <?php else: ?>
                    <?= ' / ' ?>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="row rflex">
    <div class="col-xxs-12 plates">
        <div class="plate-long">
            <?php $businessLinksCount = 0 ?>
            <?php foreach ($calendars->businessLinks as $link): ?>
                <?php $businessLinksCount++ ?>
                <a class="plate-a-margin" href="<?= $link['url'] ?>">
                    <?= $link['name'] ?>
                </a>
                <?php if ($businessLinksCount == count($calendars->businessLinks)) : ?>
                <?php else: ?>
                    <?= ' / ' ?>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
<hr>

<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с месяцами туда сюда*/ ?>
<?php /***************************** */ ?>

<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">

        <?php if ($dateData['year']['current'] == $holidaysRange['start'] && $dateData['month']['numberSimple'] == 1) : ?>

        <?php else: ?>

            <?php if ($dateData['year']['previous'] == '0000' && $dateData['month']['numberSimple'] == 1): ?>
            <?php else: ?>
                <?php if ($dateData['month']['numberSimple'] == 1): ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['previous'] ?>-<?= str_pad(12, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                        && ($dateData['year']['previous'] >= $holidaysRange['start'] && $dateData['year']['previous'] <= $holidaysRange['end']))
                        ? $countryURL['url'] . '/' : '' ?>">
                        <?= $calendarNameOfMonths[12] ?>
                    </a>
                <?php else: ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-<?= str_pad($dateData['month']['numberSimple'] - 1, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                        && ($dateData['year']['current'] >= $holidaysRange['start'] && $dateData['year']['current'] <= $holidaysRange['end']))
                        ? $countryURL['url'] . '/' : '' ?>">
                        <?= $calendarNameOfMonths[$dateData['month']['numberSimple'] - 1] ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">
        <?= $calendarNameOfMonths[$dateData['month']['numberSimple']] ?>
    </div>

    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($dateData['year']['current'] == $holidaysRange['end'] && $dateData['month']['numberSimple'] == 12) : ?>

        <?php else: ?>
            <?php if ($dateData['year']['current'] == '9999' && $dateData['month']['numberSimple'] == 12): ?>

            <?php else: ?>
                <?php if ($dateData['month']['numberSimple'] == 12): ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['next'] ?>-<?= str_pad(1, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                        && ($dateData['year']['next'] >= $holidaysRange['start'] && $dateData['year']['next'] <= $holidaysRange['end']))
                        ? $countryURL['url'] . '/' : '' ?>">
                        <?= $calendarNameOfMonths[1] ?>
                    </a>
                <?php else: ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/forty/months/<?= $dateData['year']['current'] ?>-<?= str_pad($dateData['month']['numberSimple'] + 1, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                        && ($dateData['year']['current'] >= $holidaysRange['start'] && $dateData['year']['current'] <= $holidaysRange['end']))
                        ? $countryURL['url'] . '/' : '' ?>">
                        <?= $calendarNameOfMonths[$dateData['month']['numberSimple'] + 1] ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
<hr>
<?php if ($PDFCalendarsData['exists']): ?>
    <div class="row">
        <div class="col-xxs-12 c-prev-next-right">
            <a href="#download-calendar" class="btn btn-default">
                <span class="fa fa-print fa-lg"></span>&nbsp;<?= Yii::t('app', 'Print'); ?>
            </a>
        </div>
    </div>
    <br>
<?php endif; ?>
<?php /***************************** */ ?>
<?php /***************************** Календарь с отмеченными праздниками конкретнрой страны*/ ?>
<?php /***************************** */ ?>

<div class="row rflex myear">
    <?php
    $countMonths = $dateData['month']['numberSimple'] - 1;
    $countWeeks = 0;
    //(new \common\components\dump\Dump())->printR($calendarByMonth);die;
    foreach ($calendarByMonth['calendar'] as $months) :?>

        <?php $countMonths++; ?>
        <div class="bmmonth col-xxs-12 col-sm-6 col-xs-12">
            <div class="bmweek-name">
                <div class="bmday-name">
                    #
                </div>
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <div class="bmday-name">
                        <?= $calendarNameOfDaysInWeek[$i]; ?>
                    </div>
                <?php endfor; ?>
            </div>
            <?php foreach ($months as $keyMain => $week): ?>
                <?php $countWeeks++ ?>
                <div class="bmweek">
                    <div class="owno-day">
                            <span>
                                <?php if ($countWeeks == 1 && $keyMain > 50): ?>
                                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['previous'] ?>/<?= $keyMain; ?>/">
                                        <?= $keyMain; ?>
                                    </a>
                                <?php else: ?>
                                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['current'] ?>/<?= $keyMain; ?>/">
                                        <?= $keyMain; ?>
                                    </a>
                                <?php endif; ?>
                            </span>
                    </div>
                    <?php for ($i = 1; $i <= 5; $i++): ?>

                        <?php if (isset($week[$i]['monthDay'])): ?>

                            <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                            if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?>
                                <div class="bmday-holiday" data-title="<?= $holidaysData[$key]['name'] ?>">
                                     <span>
                                     <a href="/<?= Yii::$app->language ?>/calendar/days/<?= $dateData['year']['next'] ?>-<?= str_pad(1, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                                         && ($dateData['year']['next'] >= $holidaysRange['start'] && $dateData['year']['next'] <= $holidaysRange['end']))
                                         ? $countryURL['url'] . '/' : '' ?>">
                <?= $week[$i]['monthDay']; ?>
            </a>

                                     </span>
                                </div>
                            <?php else: ?>
                                <div class="bmday">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                        <?php else: ?>
                            <div class="bmno-day">
                            <span>

                            </span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php for ($i = 6; $i <= 7; $i++): ?>
                        <?php if (isset($week[$i]['monthDay'])): ?>
                            <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                            if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?>
                                <div class="bmday-holiday" data-title="<?= $holidaysData[$key]['name'] ?>">
                                     <span>
                                    <?= $week[$i]['monthDay']; ?>
                                     </span>
                                </div>
                            <?php else: ?>
                                <div class="bmday-off">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="bmno-day">
                            <span>

                            </span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    <br> <br><br>
    <div class="bmbusiness-days col-xxs-12 col-sm-6 col-xs-12">
        <table class="business-table">
            <tr class="business-gray">
                <td class="business-left">
                    <?= Yii::t('app', 'Calendar days') ?>
                </td>
                <td class="business-right">
                    <?= $calendarByMonth['daysInMonth'][$countMonths] ?>
                </td>
            </tr>
            <tr class="business-light">
                <td class="business-left">
                    <?= Yii::t('app', 'Working days') ?>
                </td>
                <td class="business-right">
                    <?= $calendarByMonth['workingDays'][$countMonths] ?>
                </td>
            </tr>
            <tr class="business-gray">
                <td class="business-left">
                    <?= Yii::t('app', 'Days off') ?>
                </td>
                <td class="business-right">
                    <?= $calendarByMonth['allHolidays'][$countMonths] ?>
                </td>
            </tr>
            <tr class="business-ligh">
                <td class="business-left">
                    <?= Yii::t('app', '40 hour week') ?>
                </td>
                <td class="business-right">
                    <?= $calendarByMonth['hours40'][$countMonths] ?>
                </td>
            </tr>
            <tr class="business-gray">
                <td class="business-left">
                    <?= Yii::t('app', '36 hour week') ?>
                </td>
                <td class="business-right">
                    <?= $calendarByMonth['hours36'][$countMonths] ?>
                </td>
            </tr>
            <tr class="business-ligh">
                <td class="business-left">
                    <?= Yii::t('app', '24 hour week') ?>
                </td>
                <td class="business-right">
                    <?= $calendarByMonth['hours24'][$countMonths] ?>
                </td>
            </tr>

        </table>

    </div>


</div>
<br>
<hr>
<br>


<?php /***************************** */ ?>
<?php /***************************** Список всех праздников конкретной страны*/ ?>
<?php /***************************** */ ?>


<?php if ($holidaysData): ?>
    <a name="calendar-of-holidays-and-weekends-in"></a>
    <h2 class="main-page-h1">
        <?= Yii::t('app', 'Calendar for the 40 hour work week for {month} {year} {country_for}', [
            'country_for' => $countryData['name_for'],
            'year' => $dateData['year']['current'],
            'month' => $calendarNameOfMonths[$dateData['month']['numberSimple']],
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

    <a name="download-calendar"></a>
    <h2 class="main-page-h1">
        <?= Yii::t('app', 'Download and print PDF calendar for the 40 hour work week for {month} {year} {country_for}', [
            'country_for' => $countryData['name_for'],
            'year' => $dateData['year']['current'],
            'month' => $calendarNameOfMonths[$dateData['month']['numberSimple']],
        ]) ?>
    </h2>

    <br><br>

    <div class="row rflex">
        <?php foreach ($PDFCalendarsData['pdf'] as $key => $pdf): ?>
            <?php if ($pdf['pdfExists']): ?>
                <div class="col-xxs-12 col-xs-6 col-md-4 col-lg-3 d-center pdf-download">
                    <?php if ($key == 'businessYearlyP'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Portrait calendar for the 40 hour work week for the year') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'businessYearlyL'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Landscape calendar for the 40 hour work week for the year') ?></div>
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



