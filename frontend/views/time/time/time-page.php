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

phpinfo();

?>

<script>
    var nameOfDay = new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    var nameOfMonth = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Desember');
    var data = new Date();
    function clock()
    {

        var hou = data.getHours();
        var min = data.getMinutes();
        var sec = data.getSeconds();
        if(hou<10){ hou= "0"+hou;}
        if(min<10){ min= "0"+min;}
        if(sec<10){ sec= "0"+sec;}

        document.getElementById('clock').innerHTML = hou+":"+min+":"+sec;
        data.setTime(data.getTime()+1000)
        setTimeout("clock();",1000);

        document.getElementById('date').innerHTML = nameOfDay[data.getDay()] + ", " + nameOfMonth[data.getMonth()] + " " + data.getDate() + ", " + data.getFullYear();
    }

</script>
<body onload="clock()">
<h2>Current Server Time:</h2>
<h1><div id="clock"></div></h1>
<h3><div id="date"></h3>

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

    <div class="col-xxs-12 col-xs-6 plates">
        <div class="plate">
            <div class="plate-header">
                <?= Yii::t('app', 'Calendar'); ?>
                <?= ' / ' ?>
                <a href="/<?= Yii::$app->language ?>/calendar/days/today/">
                    <?= Yii::t('app', 'Today') ?>
                </a>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-01/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[1] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-02/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-03/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-04/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-05/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-06/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-07/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-08/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-09/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-10/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-11/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-12/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= $calendarNameOfMonths[12] ?></a><br>
                </div>
            </div>
            <div class="plate-links">
                <hr>
            </div>

            <div class="plate-links">
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/winter/<?= $dateData['year']['current'] ?>/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= Yii::t('app', 'Winter') ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/spring/<?= $dateData['year']['current'] ?>/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= Yii::t('app', 'Spring') ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/summer/<?= $dateData['year']['current'] ?>/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= Yii::t('app', 'Summer') ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/autumn/<?= $dateData['year']['current'] ?>/
                <?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : ''; ?>"><?= Yii::t('app', 'Autumn') ?></a><br>

                </div>
            </div>

            <?php if ($dateData['year']['current'] >= 2000 && $dateData['year']['current'] <= 2030): ?>
                <div class="plate-links">
                    <hr>
                </div>
                <div class="plate-links">
                    <form method="get" id="form">
                        <div class="form-group">
                            <script>
                                let url = '<?php echo \yii\helpers\Url::home(true) . Yii::$app->language . '/calendar/years/' . $dateData['year']['current'] . '/';?>';
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
<hr>

<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с годами туда сюда*/ ?>
<?php /***************************** */ ?>


<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($dateData['year']['previous'] == '0000'): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/years/<?= $dateData['year']['previous'] ?>/
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

        <?php if ($dateData['year']['current'] == '9999'): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/years/<?= $dateData['year']['next'] ?>/
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


<div class="row rflex year">
    <?php
    $countMonths = 0;
    $countWeeks = 0;
    foreach ($calendarByYear as $months) :?>

        <?php $countMonths++; ?>
        <div class="month col-xxs-12 col-xs-6 col-sm-4 col-md-3">
            <div class="month-name">
            <span class="fa fa-calendar">
                </span>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/
                    <?= (($countryURL['url'] <> '')
                    && ($dateData['year']['next'] >= $holidaysRange['start'] && $dateData['year']['next'] <= $holidaysRange['end']))
                    ? $countryURL['url'] . '/' : '' ?>">
                    <?= $calendarNameOfMonths[$countMonths]; ?>
                </a>

            </div>

            <div class="week-name">
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <div class="day-name">
                        <?= $calendarNameOfDaysInWeek[$i]; ?>
                    </div>
                <?php endfor; ?>
            </div>


            <?php foreach ($months as $week): ?>
                <div class="week">
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
        </div>
    <?php endforeach; ?>

</div>
<br>
<hr>
<br>

<?php /***************************** */ ?>
<?php /***************************** Список всех праздников конкретной страны*/ ?>
<?php /***************************** */ ?>

<?php if ($holidaysData): ?>
    <a name="calendar-of-holidays-and-weekends"></a>
    <h2 class="main-page-h1">
        <?= Yii::t('app', 'Calendar of holidays and weekends in {year} {country_for}', [
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
    <?php if ($holidaysData): ?>
        <a name="download-calendar"></a>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Download and print PDF calendar with holidays and weekends for {year} {country_for}', [
                'country_for' => $countryData['name_for'],
                'year' => $dateData['year']['current'],
            ]) ?>
        </h2>
    <?php else: ?>
        <a name="download-calendar"></a>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Download and print PDF calendar for {year}', [
                'year' => $dateData['year']['current'],
            ]) ?>
        </h2>
    <?php endif; ?>
    <br><br>

    <div class="row rflex">
        <?php foreach ($PDFCalendarsData['pdf'] as $key => $pdf): ?>
            <?php if ($pdf['pdfExists']): ?>
                <div class="col-xxs-12 col-xs-6 col-md-4 col-lg-3 d-center pdf-download">
                    <?php if ($key == 'P'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Holidays portrait calendar') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'L'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Holidays landscape calendar') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'PNoHolidays'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Portrait calendar without holidays') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'LNoHolidays'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Landscape calendar without holidays') ?></div>
                    <?php endif; ?>

                    <?php if ($key == 'seasonsP'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Portrait calendar for the year by seasons with holidays') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'seasonsL'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'landscape calendar for the year by seasons with holidays') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'seasonsPNoHolidays'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Portrait calendar for the year by seasons') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'seasonsLNoHolidays'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'landscape calendar for the year by seasons') ?></div>
                    <?php endif; ?>

                    <a href="<?= $pdf['imgPathRelative'] ?>" class="lightzoom">
                        <img class="c-download-img " alt="" src="<?= $pdf['imgPathRelative'] ?>" width="100%">
                    </a>

                    <a href="<?= $pdf['pdfPathRelative'] ?>" download class="btn btn-success c-download-button"
                       target="_blank">
                        <?= Yii::t('app', 'Download') ?>
                    </a>
                    <br>
                    <a href="<?= $pdf['pdfPathRelative'] ?>" class="btn btn-success c-download-button" target="_blank">
                        <?= Yii::t('app', 'Print') ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php else: ?>
<?php endif; ?>



