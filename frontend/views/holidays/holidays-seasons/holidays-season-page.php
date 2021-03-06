<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $date common\componentsV2\date\Date
 * @var $countriesData common\components\countries\CountriesData
 * @var $holidaysData common\components\holidays\HolidaysByCountryByYear array
 * @var $holidaysTypesData common\components\holidaysTypes\HolidaysTypesData
 * @var $countryData common\components\country\CountryData
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths
 * @var $calendarNameOfDaysInWeek common\components\calendar\CalendarNameOfDaysInWeek
 * @var $PDFCalendarsData common\components\PDFCalendars\PDFCalendarsYearlyExists
 * @var $holidaysRange common\components\holidays\HolidaysRange
 * @var $calendarBySeasons common\components\calendar\CalendarBySeasons
 * @var $countryURL array [url, id, defaultID].
 * @var $seasonURL string winter, summer, spring, autumn.
 * @var $pageTextsMessages common\components\pageTexts\PageTextsMessagesByCalendarSeason
 */

?>


<a name="holidays-calendar-<?= $date->year->current ?>"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<div class="row">
    <?php /** Сегодняшний сезон */ ?>
    <div class="col-xxs-12 col-xs-6 current-date">
        <div class="current-date-div">
            <div class="current-date-one">
                <div class="current-date-year">
                    <?php if ($seasonURL == 'winter') : ?>
                        <?= Yii::t('app', 'Winter') ?>
                    <?php endif; ?>
                    <?php if ($seasonURL == 'spring') : ?>
                        <?= Yii::t('app', 'Spring') ?>
                    <?php endif; ?>
                    <?php if ($seasonURL == 'summer') : ?>
                        <?= Yii::t('app', 'Summer') ?>
                    <?php endif; ?>
                    <?php if ($seasonURL == 'autumn') : ?>
                        <?= Yii::t('app', 'Autumn') ?>
                    <?php endif; ?>
                    <br>
                    <span class="current-date-month">
                        <?= $date->year->current; ?>&nbsp;<?= Yii::t('app', 'year'); ?>
                    </span>
                </div>
            </div>
            <div class="current-date-text">

                <?= Yii::$app->params['text']['text1'] ?>
            </div>
        </div>
    </div>

    <div class="col-xxs-12 col-xs-6 plates">
        <div class="plate">
            <div class="plate-header">
                <a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Holidays') ?>
                    <?= ' ' . Yii::t('app', 'in the world') ?>
                </a>
                <?= ' / ' ?>
                <a href="/<?= Yii::$app->language ?>/holidays/days/today/">
                    <?= Yii::t('app', 'Today') ?>
                </a>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 c-links-mp-months ">
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-01/"><?= $calendarNameOfMonths[1] ?>
                    </a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-02/"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-03/"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-04/"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-05/"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-06/"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 c-links-mp-months">
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-07/"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-08/"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-09/"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-10/"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-11/"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-12/"><?= $calendarNameOfMonths[12] ?></a><br>
                </div>
            </div>
            <div class="plate-links">
                <hr>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 c-links-mp-months ">
                    <a href="/<?= Yii::$app->language ?>/holidays/seasons/winter/<?= $date->year->current ?>/"><?= Yii::t('app', 'Winter'); ?>
                    </a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/seasons/spring/<?= $date->year->current ?>/"><?= Yii::t('app', 'Spring'); ?></a><br>
                </div>
                <div class="col-xs-6 c-links-mp-months">
                    <a href="/<?= Yii::$app->language ?>/holidays/seasons/summer/<?= $date->year->current ?>/"><?= Yii::t('app', 'Summer'); ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/holidays/seasons/autumn/<?= $date->year->current ?>/"><?= Yii::t('app', 'Autumn'); ?></a><br>
                </div>
            </div>

        </div>
    </div>

</div>

<hr>

<?php
/**
 * Верхняя плашка календаря с годами туда сюда
 */

?>

<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($date->year->previous == $holidaysRange['start']): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/holidays/seasons/<?= $seasonURL ?>/<?= $date->year->previous ?>/">
                <?= $date->year->previous ?>
            </a>
        <?php endif; ?>

    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">

        <?= $date->year->current ?>

    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($date->year->current == $holidaysRange['end']): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/holidays/seasons/<?= $seasonURL ?>/<?= $date->year->next ?>/">
                <?= $date->year->next ?>
            </a>
        <?php endif; ?>

    </div>
</div>
<hr>


<?php /***************************** */ ?>
<?php /***************************** Список всех праздников*/ ?>
<?php /***************************** */ ?>

<?php if ($holidaysData): ?>
    <a name="calendar-of-holidays-and-weekends"></a>
    <br>
    <?php if ($seasonURL == 'winter') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Nearest winter holidays in the world in {year}', [
                'year' => $date->year->current,
            ]) ?>
        </h2>
    <?php endif; ?>
    <?php if ($seasonURL == 'spring') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Nearest spring holidays in the world in {year}', [
                'year' => $date->year->current,
            ]) ?>
        </h2>
    <?php endif; ?>
    <?php if ($seasonURL == 'summer') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Nearest summer holidays in the world in {year}', [
                'year' => $date->year->current,
            ]) ?>
        </h2>
    <?php endif; ?>
    <?php if ($seasonURL == 'autumn') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Nearest autumn holidays in the world in {year}', [
                'year' => $date->year->current,
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
                    <a href="/<?= Yii::$app->language ?>/holidays/<?= $holiday['holidayUrl'] ?>/">
                        <?= $holiday['holidayName'] ?>
                    </a>
                </div>
                <div class="h-table-td">

                    <?= $holiday['holidayTypeName'] ?>

                </div>
                <div class="h-table-td">

                    <a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/<?= $holiday['countryUrl'] ?>/">
                        <?= $holiday['countryName'] ?>
                    </a>


                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
    <hr>
<?php endif; ?>

