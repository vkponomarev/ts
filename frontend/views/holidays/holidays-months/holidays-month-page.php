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


<a name="holidays-calendar-<?= $date->year->current ?>"></a><h1
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

    <?php /***************************** */ ?>
    <?php /***************************** Выберите страну*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 plates">
        <div class="plate">
            <div class="plate-header">
                <a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>">
                    <?= Yii::t('app', 'Holidays'); ?>
                    <?= ($countryURL['url'] <> '') ? ' ' . $countryData['name_in'] : ' ' . Yii::t('app', 'in the world'); ?>
                </a>
                <?= ' / ' ?>
                <a href="/<?= Yii::$app->language ?>/holidays/days/today/">
                    <?= Yii::t('app', 'Today') ?>
                </a>
            </div>
            <div class="plate-links">
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
            <?php if ($date->year->current >= 2000 && $date->year->current <= 2030): ?>
                <div class="plate-links">
                    <hr>
                </div>
                <div class="plate-links">
                    <form method="get" id="form">
                        <div class="form-group">
                            <script>
                                let url = '<?php echo \yii\helpers\Url::home(true) . Yii::$app->language . '/holidays/months/' . $date->year->current . '-' . $date->month->current . '/';?>';
                            </script>
                            <select id="selectCountry" class="form-control">
                                <option>
                                    <?php if (isset($countryData['name'])) : ?>
                                        <?= $countryData['name'] ?>
                                    <?php else: ?>
                                        <?= Yii::t('app', 'Choose the country'); ?>
                                    <?php endif; ?>
                                </option>
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

<hr>
<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с месяцами туда сюда*/ ?>
<?php /***************************** */ ?>

<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">

        <?php if ($date->year->current == $holidaysRange['start'] && $date->month->simple == 1) : ?>

        <?php else: ?>

            <?php if ($date->year->previous == '0000' && $date->month->simple == 1): ?>
            <?php else: ?>
                <?php if ($date->month->simple == 1): ?>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->previous ?>-<?= str_pad(12, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                        && ($date->year->previous >= $holidaysRange['start'] && $date->year->previous <= $holidaysRange['end']))
                        ? $countryURL['url'] . '/' : '' ?>">
                        <?= $calendarNameOfMonths[12] ?>
                    </a>
                <?php else: ?>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-<?= str_pad($date->month->simple - 1, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                        && ($date->year->current >= $holidaysRange['start'] && $date->year->current <= $holidaysRange['end']))
                        ? $countryURL['url'] . '/' : '' ?>">
                        <?= $calendarNameOfMonths[$date->month->simple - 1] ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">
        <?= $calendarNameOfMonths[$date->month->simple] ?>
    </div>

    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($date->year->current == $holidaysRange['end'] && $date->month->simple == 12) : ?>

        <?php else: ?>
            <?php if ($date->year->current == '9999' && $date->month->simple == 12): ?>

            <?php else: ?>
                <?php if ($date->month->simple == 12): ?>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->next ?>-<?= str_pad(1, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                        && ($date->year->next >= $holidaysRange['start'] && $date->year->next <= $holidaysRange['end']))
                        ? $countryURL['url'] . '/' : '' ?>">
                        <?= $calendarNameOfMonths[1] ?>
                    </a>
                <?php else: ?>
                    <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-<?= str_pad($date->month->simple + 1, 2, '0', STR_PAD_LEFT) ?>/
            <?= (($countryURL['url'] <> '')
                        && ($date->year->current >= $holidaysRange['start'] && $date->year->current <= $holidaysRange['end']))
                        ? $countryURL['url'] . '/' : '' ?>">
                        <?= $calendarNameOfMonths[$date->month->simple + 1] ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
<hr>
<br>
<?php /***************************** */ ?>
<?php /***************************** Список всех праздников*/ ?>
<?php /***************************** */ ?>

<?php if ($holidaysData): ?>
    <a name="calendar-of-holidays-and-weekends"></a>
    <?php if ($countryData) : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Upcoming holidays {country_in} for {month} {year}', [
                'year' => $date->year->current,
                'country_in' => $countryData['name_in'],
                'month' => $calendarNameOfMonths[$date->month->simple],
            ]) ?>
        </h2>
    <?php else: ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Upcoming holidays in the world for {month} {year}', [
                'year' => $date->year->current,
                'month' => $calendarNameOfMonths[$date->month->simple],
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
                    <a href="/<?= Yii::$app->language ?>/holidays/<?= $holiday['holidayUrl'] ?>/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>">
                        <?= $holiday['holidayName'] ?>
                    </a>
                </div>
                <div class="h-table-td">

                    <?= $holiday['holidayTypeName'] ?>

                </div>
                <div class="h-table-td">
                    <?php if ($countryData) : ?>
                        <?= $holiday['countryName'] ?>
                    <?php else: ?>
                        <a href="/<?= Yii::$app->language ?>/holidays/months/<?= $date->year->current ?>-<?= $date->month->current ?>/<?= $holiday['countryUrl'] ?>/">
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


