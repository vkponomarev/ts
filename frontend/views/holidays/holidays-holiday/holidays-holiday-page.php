<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $dateData common\components\date\DateData
 * @var $date common\componentsV2\date\Date
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


<a name="calendar-<?= $date->year->current ?>"></a><h1
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
                    <?= $date->year->current ?>
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

    <div class="col-xxs-12 col-xs-6 c-links-mp">
        <div class="c-links-block c-links-mp-header">
            <a class="c-links-mp-header-link"
               href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>">
                <?= Yii::t('app', 'Holidays'); ?>
            </a>
        </div>
        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months ">
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-01/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[1] ?>
                    </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-02/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[2] ?></a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-03/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[3] ?></a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-04/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[4] ?></a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-05/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[5] ?></a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-06/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[6] ?></a><br>
            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-07/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[7] ?></a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-08/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[8] ?></a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-09/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[9] ?></a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-10/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[10] ?></a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-11/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[11] ?></a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-12/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>"><?= $calendarNameOfMonths[12] ?></a><br>
            </div>
        </div>
        <div class="c-links-block">
            <hr class="hr-1">
        </div>


    </div>
</div>
<br><br>
<hr>
<br>
<?php /***************************** */ ?>
<?php /***************************** Список всех праздников*/ ?>
<?php /***************************** */ ?>

<?php if ($holidaysData): ?>
    <a name="calendar-of-holidays-and-weekends-in-<?= $date->year->current ?>-<?= $countryData['name_en'] ?>"></a>
    <?php if ($countryData) : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', '{holiday} upcoming holiday dates {country_in}', [
                'country_in' => $countryData['name_in'],
                'holiday' => $holidayData['holidayName'],
            ]) ?>
        </h2>
    <?php else: ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', '{holiday} upcoming holiday dates in the world in {year}', [
                'year' => $date->year->current,
                'holiday' => $holidayData['holidayName'],
            ]) ?>
        </h2>

    <?php endif; ?>

    <br><br>


    <div class="h-table">
        <div class="h-table-line">
            <div class="h-table-title-first">
                <?= Yii::t('app', 'Date') ?>
            </div>
            <div class="h-table-title">
                <?= Yii::t('app', 'Title') ?>
            </div>
            <div class="h-table-title">
                <?= Yii::t('app', 'Type') ?>
            </div>
            <div class="h-table-title">
                <?= Yii::t('app', 'Country') ?>
            </div>
        </div>
        <?php foreach ($holidaysData as $holiday) : ?>
            <?php $dateFormat = new \DateTime($holiday['date']) ?>
            <div class="h-table-line">
                <div class="h-table-td-first">
                    <?= Yii::$app->formatter->asDate($holiday['date'], 'medium'); ?>
                </div>
                <div class="h-table-td">
                    <?php if ($countryURL['url'] == '') : ?>
                    <a href="/<?= Yii::$app->language ?>/holidays/<?= $holiday['holidayUrl'] ?>/<?= $holiday['countryUrl'] ?>/">
                        <?= $holiday['holidayName'] ?>
                    </a>
                    <?php else: ?>
                        <?= $holiday['holidayName'] ?>
                    <?php endif; ?>
                </div>
                <div class="h-table-td">

                    <?= $holiday['holidayTypeName'] ?>

                </div>
                <div class="h-table-td">
                    <?php if ($countryData) : ?>
                        <?= $holiday['countryName'] ?>
                    <?php else: ?>
                        <a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/<?= $holiday['countryUrl'] ?>/">
                            <?= $holiday['countryName'] ?>
                        </a>

                    <?php endif; ?>

                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <br>
    <hr>
<?php endif; ?>


