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
    <?php /** Выберите страну */ ?>
    <div class="col-xxs-12 col-xs-6 c-links-mp">
        <?php if ($dateData['year']['current'] >= 2000 && $dateData['year']['current'] <= 2030): ?>
            <div class="c-links-block c-links-mp-header c-links-mp-header-link">
                <?= Yii::t('app', 'Choose the country'); ?>
            </div>
            <div class="c-links-block">
                <form method="get" id="form">
                    <div class="form-group">
                        <script>
                            let url = '<?php echo \yii\helpers\Url::home(true) . Yii::$app->language . '/calendar/business/six-days/months/' . $dateData['year']['current'] . '-' . $dateData['month']['number'] . '/';?>';
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
<?php /***************************** Верхняя плашка календаря с месяцами туда сюда*/ ?>
<?php /***************************** */ ?>

<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">

        <?php if ($dateData['year']['current'] == $holidaysRange['start'] && $dateData['month']['numberSimple'] == 1) : ?>

        <?php else: ?>

            <?php if ($dateData['year']['previous'] == '0000' && $dateData['month']['numberSimple'] == 1): ?>
            <?php else: ?>
                <?php if ($dateData['month']['numberSimple'] == 1): ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/six-days/months/<?= $dateData['year']['previous'] ?>-<?= str_pad(12, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                        && ($dateData['year']['previous'] >= $holidaysRange['start'] && $dateData['year']['previous'] <= $holidaysRange['end']))
                        ? $countryURL['url'] . '/' : '' ?>">
                        <?= $calendarNameOfMonths[12] ?>
                    </a>
                <?php else: ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/six-days/months/<?= $dateData['year']['current'] ?>-<?= str_pad($dateData['month']['numberSimple'] - 1, 2, '0', STR_PAD_LEFT) ?>/
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
                    <a href="/<?= Yii::$app->language ?>/calendar/business/six-days/months/<?= $dateData['year']['next'] ?>-<?= str_pad(1, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                        && ($dateData['year']['next'] >= $holidaysRange['start'] && $dateData['year']['next'] <= $holidaysRange['end']))
                        ? $countryURL['url'] . '/' : '' ?>">
                        <?= $calendarNameOfMonths[1] ?>
                    </a>
                <?php else: ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/business/six-days/months/<?= $dateData['year']['current'] ?>-<?= str_pad($dateData['month']['numberSimple'] + 1, 2, '0', STR_PAD_LEFT) ?>/
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
    <a name="calendar-of-holidays-and-weekends-in-<?= $calendarNameOfMonths[$dateData['month']['numberSimple']] ?>-<?= $dateData['year']['current'] ?>-<?= $countryData['name_en'] ?>"></a>
    <h2 class="main-page-h1">
        <?= Yii::t('app', 'Business days calendar with a six-day work week with holidays and weekends for {month} {year} {country_for}', [
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

