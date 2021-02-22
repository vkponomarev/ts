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


$moon = new \common\components\moon\Moon();

?>


<a name="calendar-<?= $dateData['year']['current'] ?>"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<div class="row">
    <?php /** Сегодняшний год */ ?>
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
    <?php /***************************** Ссылки на основной календарь*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 plates">
        <div class="plate">
            <div class="plate-header">
                <?= Yii::t('app', 'Moon phases'); ?>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-01/"><?= $calendarNameOfMonths[1] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-02/"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-03/"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-04/"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-05/"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-06/"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-07/"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-08/"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-09/"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-10/"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-11/"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $dateData['year']['current'] ?>-12/"><?= $calendarNameOfMonths[12] ?></a><br>
                </div>
            </div>
            <div class="plate-links">
                <hr>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/days/today/">
                        <?= Yii::t('app', 'Moon day today') ?>
                    </a>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phases/days/today/">
                        <?= Yii::t('app', 'Moon phases today') ?>
                    </a>
                </div>
            </div>

        </div>
    </div>


    <?php
    /*
     *
     * <div class="col-xxs-12 col-xs-6 c-links-mp">
<div class="c-links-block c-links-mp-header c-links-mp-header-link">
    <?= Yii::t('app', 'Choose the city'); ?>
</div>
<div>
    $template = '<div class="search-value-div"><p class="search-value">{{value}}</p>';
    echo \kartik\typeahead\Typeahead::widget([
        'name' => 'typeahead',
        'options' => ['placeholder' => $cityData['name']
        ],
        'pluginOptions' => ['hint' => true, 'highlight' => true, 'minLength' => 3],
        'pluginEvents' => [
            "typeahead:select" => "function(ev, suggestion) {
                if (typeof suggestion.id === \"undefined\" || suggestion.id === null || suggestion.id ===  \"\") {
                    //here u can open search page
                } else {
                    window.location = '/" . Yii::$app->language . "/calendar/moon/years/" . $dateData['year']['current'] . "/?city=' + suggestion.id + '';
                }
            }"
        ],
        'dataset' => [
            [
                'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                'display' => 'value',
                'limit' => 10,
                'templates' => [
                    'notFound' => '<div class="text-danger" style="padding:0 8px">' . Yii::t('app', 'No matches found.') . '</div>',
                    'suggestion' => new \yii\web\JsExpression("Handlebars.compile('{$template}')")
                ],
                'remote' => [
                    'url' => \yii\helpers\Url::to(['search/search-city']) . '?q=%QUERY',
                    'wildcard' => '%QUERY'
                ]
            ],
        ]
    ]);</div>*/

    ?>


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
            <?php $moonLinksCount = 0 ?>
            <?php foreach ($calendars->moonLinks as $link): ?>
                <?php $moonLinksCount++ ?>
                <a class="plate-a-margin" href="<?= $link['url'] ?>">
                    <?= $link['name'] ?>
                </a>
                <?php if ($moonLinksCount == count($calendars->moonLinks)) : ?>
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
        <?php if ($dateData['year']['previous'] == '0100'): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/years/<?= $dateData['year']['previous'] ?>/">
                <?= $dateData['year']['previous'] ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">

        <?= $dateData['year']['current'] ?>

    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($dateData['year']['current'] == '9998'): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/years/<?= $dateData['year']['next'] ?>/">
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
<?php /***************************** Лунный календарь*/ ?>
<?php /***************************** */ ?>

<div class="row rflex year">
    <?php
    $countMonths = 0;
    $countWeeks = 0;
    $countMoonDay = 0;
    //(new \common\components\dump\Dump())->printR($calendarByYear['moonPhases']['moonThirdQuarter']);
    //number_format($week[$i]['moonPhase']['phase'], 2, '.', ' ');
    foreach ($calendarByYear['calendar'] as $key => $months) :?>
        <?php $countMonths++; ?>
        <div class="month col-xxs-12 col-xs-6 col-sm-4 col-md-3">
            <div class="month-name">
            <span class="fa fa-calendar">
                </span>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/months/<?= $dateData['year']['current'] ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
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
                <?php $countWeeks++; ?>
                <div class="week">
                    <?php for ($i = 1; $i <= 5; $i++): ?>

                        <?php if (isset($week[$i]['monthDay'])): ?>


                            <div class="day">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?><br>
                                         <img width="18"
                                              src="/pictures/moon-phases/<?= $moon->pictures($week[$i], $calendarByYear['moonPhases']) ?>"><br>
                                    <?= $calendarByYear['moonDay'][$week[$i]['date']]; ?>

                                    </span>
                            </div>

                        <?php else: ?>
                            <div class="no-day">
                            <span>

                            </span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php for ($i = 6; $i <= 7; $i++): ?>
                        <?php if (isset($week[$i]['monthDay'])): ?>

                            <div class="day-off">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?><br>
                                         <img width="18"
                                              src="/pictures/moon-phases/<?= $moon->pictures($week[$i], $calendarByYear['moonPhases']) ?>"><br>
                                    <?= $calendarByYear['moonDay'][$week[$i]['date']]; ?>
                                    </span>
                            </div>
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
<?php /***************************** Фазы луны*/ ?>
<?php /***************************** */ ?>


<a name="moon-phases-<?= $dateData['year']['current'] ?>"></a>
<h2 class="main-page-h1">
    <?= Yii::t('app', 'Moon phases for {year}', [
        'year' => $dateData['year']['current'],
    ]) ?>
</h2>

<br><br>
<div class="row rflex">

    <?php foreach ($calendarByYear['moonMonth'] as $moonMonth): ?>
        <?php if (isset($moonMonth['start']) && isset($moonMonth['end'])) : ?>
            <?php //$moonMonthStart = (new \DateTime($moonMonth['start']))->format('Y-m-d'); ?>
            <?php //$moonMonthEnd = (new \DateTime($moonMonth['end']))->format('Y-m-d'); ?>

            <div class="col-xxs-12 col-xs-6 col-md-6 moon-month">
                <table class="moon-phases-table">

                    <?php foreach ($calendarByYear['moonPhases'] as $moonPhaseName => $moonPhase): ?>

                        <?php foreach ($moonPhase as $moonPhaseDate => $value): ?>
                            <?php //$moonPhaseDate = (new \DateTime($moonPhaseDate))->format('Y-m-d'); ?>

                            <?php if ($moonPhaseDate >= $moonMonth['start'] && $moonPhaseDate <= ($moonMonth['end'])) : ?>
                                <?php $dateFormat = new \DateTime($moonPhaseDate) ?>

                                <?php if ($moonPhaseName == 'newMoon') : ?>
                                    <tr class="moon-phases-tr">
                                        <td>
                                            <?= Yii::t('app', 'New moon') ?>

                                        </td>
                                        <td class="moon-phases-img">
                                            <img width="18"
                                                 src="/pictures/moon-phases/moon-0-1.png">
                                        </td>
                                        <td>
                                            <?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>


                                <?php if ($moonPhaseName == 'waxingCrescentStart') : ?>
                                    <tr class="moon-phases-tr">
                                    <td>
                                        <?= Yii::t('app', 'Waxing crescent') ?>
                                    </td>
                                    <td class="moon-phases-img">
                                        <img width="18"
                                             src="/pictures/moon-phases/moon-0-2.png">
                                        <img width="18"
                                             src="/pictures/moon-phases/moon-0-4.png">
                                    </td>
                                    <td>
                                    <?= Yii::t('app', 'from') . ' ' . Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                <?php endif; ?>

                                <?php if ($moonPhaseName == 'waxingCrescentEnd') : ?>
                                    <?= ' ' . Yii::t('app', 'to') . ' ' . Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>

                                    </td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($moonPhaseName == 'moonFirstQuarter') : ?>
                                    <tr class="moon-phases-tr">
                                        <td>
                                            <?= Yii::t('app', 'Moon first quarter') ?>
                                        </td>
                                        <td class="moon-phases-img">
                                            <img width="18"
                                                 src="/pictures/moon-phases/moon-0-5.png">
                                        </td>
                                        <td>
                                            <?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($moonPhaseName == 'growingMoonStart') : ?>
                                    <tr class="moon-phases-tr">
                                    <td>
                                        <?= Yii::t('app', 'Growing moon') ?>
                                    </td>
                                    <td class="moon-phases-img">
                                        <img width="18"
                                             src="/pictures/moon-phases/moon-0-6.png">
                                        <img width="18"
                                             src="/pictures/moon-phases/moon-0-8.png">
                                    </td>
                                    <td>
                                    <?= Yii::t('app', 'from') . ' ' . Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>

                                <?php endif; ?>

                                <?php if ($moonPhaseName == 'growingMoonEnd') : ?>
                                    <?= ' ' . Yii::t('app', 'to') . ' ' . Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>

                                    </td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($moonPhaseName == 'fullMoon') : ?>
                                    <tr class="moon-phases-tr">
                                        <td>
                                            <?= Yii::t('app', 'Full moon') ?>

                                        </td>
                                        <td class="moon-phases-img">
                                            <img width="18"
                                                 src="/pictures/moon-phases/moon-1-0.png">
                                        </td>
                                        <td>
                                            <?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($moonPhaseName == 'waningMoonStart') : ?>
                                    <tr class="moon-phases-tr">
                                    <td>
                                        <?= Yii::t('app', 'Waning moon') ?>
                                    </td>
                                    <td class="moon-phases-img">
                                        <img width="18"
                                             src="/pictures/moon-phases/moon-1-1.png">
                                        <img width="18"
                                             src="/pictures/moon-phases/moon-1-3.png">
                                    </td>
                                    <td>

                                    <?= Yii::t('app', 'from') . ' ' . Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                <?php endif; ?>

                                <?php if ($moonPhaseName == 'waningMoonEnd') : ?>
                                    <?= ' ' . Yii::t('app', 'to') . ' ' . Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                    </td>
                                    </tr>
                                <?php endif; ?>


                                <?php if ($moonPhaseName == 'moonThirdQuarter') : ?>
                                    <tr class="moon-phases-tr">
                                        <td>

                                            <?= Yii::t('app', 'Moon third quarter') ?>
                                        </td>
                                        <td class="moon-phases-img">
                                            <img width="18"
                                                 src="/pictures/moon-phases/moon-1-4.png">
                                        </td>
                                        <td>
                                            <?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($moonPhaseName == 'waningCrescentStart') : ?>
                                    <tr class="moon-phases-tr">
                                    <td>
                                        <?= Yii::t('app', 'Waning crescent') ?>
                                    </td>
                                    <td class="moon-phases-img">
                                        <img width="18"
                                             src="/pictures/moon-phases/moon-1-5.png">
                                        <img width="18"
                                             src="/pictures/moon-phases/moon-1-7.png">
                                    </td>
                                    <td>

                                    <?= Yii::t('app', 'from') . ' ' . Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                <?php endif; ?>

                                <?php if ($moonPhaseName == 'waningCrescentEnd') : ?>
                                    <?= ' ' . Yii::t('app', 'to') . ' ' . Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                    </td>
                                    </tr>
                                <?php endif; ?>

                            <?php endif; ?>


                        <?php endforeach ?>

                    <?php endforeach ?>

                </table>
            </div>
        <?php endif; ?>
    <?php endforeach ?>


</div>
<br>
<hr>

<?php /***************************** */ ?>
<?php /***************************** Ссылки на PDF календари*/ ?>
<?php /***************************** */ ?>


<?php if ($PDFCalendarsData['exists']): ?>
    <br>

    <a name="download-calendar-<?= $dateData['year']['current'] ?>"></a>
    <h2 class="main-page-h1">
        <?= Yii::t('app', 'Download and print PDF lunar calendar (moon phases) for {year}', [
            'year' => $dateData['year']['current'],
        ]) ?>
    </h2>
    <br><br>

    <div class="row rflex">
        <?php foreach ($PDFCalendarsData['pdf'] as $key => $pdf): ?>
            <?php if ($pdf['pdfExists']): ?>
                <div class="col-xxs-12 col-xs-6 col-md-4 col-lg-3 d-center pdf-download">
                    <?php if ($key == 'moonPNoHolidays'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Portrait lunar calendar for the year') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'moonLNoHolidays'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Landscape lunar calendar for the year') ?></div>
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



