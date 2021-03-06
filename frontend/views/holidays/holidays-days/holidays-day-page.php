<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $dateData common\components\date\DateData
 * @var $date common\componentsV2\date\Date
 * @var $dateToday common\componentsV2\date\Date
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
    <?php /***************************** */ ?>
    <?php /***************************** */ ?>


    <div class="col-xxs-12 col-xs-6 plates">

        <div class="plate">
            <?php if ($countryURL['url'] <> '') : ?>
                <div class="plate-header">
                    <a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>/">
                        <?= Yii::t('app', 'Holidays'); ?>
                        <?= ($countryURL['url'] <> '') ? ' ' . $countryData['name_in'] : ' ' . Yii::t('app', 'in the world'); ?>
                    </a>
                    <?= ' / ' ?>
                    <a href="/<?= Yii::$app->language ?>/holidays/days/today/">
                        <?= Yii::t('app', 'Today') ?>
                    </a>
                </div>
            <?php else: ?>
                <?php if ($dayNameURL <> 'today') : ?>
                    <div class="plate-header">
                        <a href="/<?= Yii::$app->language ?>/holidays/days/today/">
                            <?= Yii::t('app', 'Holidays'); ?>
                            <?= ' ' . Yii::t('app', 'today'); ?>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="plate-header">
                        <a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Holidays'); ?>
                            <?= ' ' . Yii::t('app', 'in the world'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

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

            <?php if ($dayNameURL == 'today') : ?>
                <div class="c-links-block">
                    <hr>
                </div>

                <?php if ($date->year->current >= 2000 && $date->year->current <= 2030): ?>

                    <div class="c-links-block">
                        <form method="get" id="form">
                            <div class="form-group">
                                <script>
                                    let url = '<?php echo \yii\helpers\Url::home(true) . Yii::$app->language . '/holidays/days/today/';?>';
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
            <?php endif; ?>

        </div>
    </div>
</div>
<hr>
<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с годами туда сюда*/ ?>
<?php /***************************** */ ?>


<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($date->current == '2000-01-01') : ?>
        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/holidays/days/
            <?php if ($dayNameURL) : ?>
                <?= ($dayNameURL == 'today') ? 'yesterday' : '' ?>
                <?= ($dayNameURL == 'yesterday') ? $date->previous : '' ?>
                <?= ($dayNameURL == 'tomorrow') ? 'today' : '' ?>
            <?php else: ?>
                <?php if ($date->previous == $dateToday->next) : ?>
                    <?= 'tomorrow' ?>
                <?php elseif ($date->previous == $dateToday->previous): ?>
                    <?= 'yesterday' ?>
                <?php elseif ($date->previous == $dateToday->current): ?>
                    <?= 'today' ?>
                <?php else: ?>
                    <?= $date->previous ?>
                <?php endif; ?>
            <?php endif; ?>
            /">
                <?php if ($dayNameURL) : ?>
                    <?= ($dayNameURL == 'today') ? Yii::t('app', 'Yesterday') : '' ?>
                    <?= ($dayNameURL == 'yesterday') ? Yii::$app->formatter->asDate($date->previous, 'medium') : '' ?>
                    <?= ($dayNameURL == 'tomorrow') ? Yii::t('app', 'Today') : '' ?>
                <?php else: ?>
                    <?php if ($date->previous == $dateToday->next) : ?>
                        <?= Yii::t('app', 'Tomorrow') ?>
                    <?php elseif ($date->previous == $dateToday->previous): ?>
                        <?= Yii::t('app', 'Yesterday') ?>
                    <?php elseif ($date->previous == $dateToday->current): ?>
                        <?= Yii::t('app', 'Today') ?>
                    <?php else: ?>
                        <?= Yii::$app->formatter->asDate($date->previous, 'medium') ?>
                    <?php endif; ?>

                <?php endif; ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">
        <?php if ($dayNameURL) : ?>
            <?= ($dayNameURL == 'today') ? Yii::t('app', 'Today') : '' ?>
            <?= ($dayNameURL == 'yesterday') ? Yii::t('app', 'Yesterday') : '' ?>
            <?= ($dayNameURL == 'tomorrow') ? Yii::t('app', 'Tomorrow') : '' ?>
        <?php else: ?>
            <?php if ($date->current == $dateToday->next) : ?>
                <?= Yii::t('app', 'Tomorrow') ?>
            <?php elseif ($date->current == $dateToday->previous): ?>
                <?= Yii::t('app', 'Yesterday') ?>
            <?php elseif ($date->current == $dateToday->current): ?>
                <?= Yii::t('app', 'Today') ?>
            <?php else: ?>
                <?= Yii::$app->formatter->asDate($date->current, 'medium') ?>
            <?php endif; ?>

        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($date->current == '2030-12-31') : ?>
        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/holidays/days/
            <?php if ($dayNameURL) : ?>
                <?= ($dayNameURL == 'today') ? 'tomorrow' : '' ?>
                <?= ($dayNameURL == 'yesterday') ? 'today' : '' ?>
                <?= ($dayNameURL == 'tomorrow') ? $date->next : '' ?>
            <?php else: ?>
                <?php if ($date->next == $dateToday->next) : ?>
                    <?= 'tomorrow' ?>
                <?php elseif ($date->next == $dateToday->previous): ?>
                    <?= 'yesterday' ?>
                <?php elseif ($date->next == $dateToday->current): ?>
                    <?= 'today' ?>
                <?php else: ?>
                    <?= $date->next ?>
                <?php endif; ?>
        <?php endif; ?>

            /">
                <?php if ($dayNameURL) : ?>
                    <?= ($dayNameURL == 'today') ? Yii::t('app', 'Tomorrow') : '' ?>
                    <?= ($dayNameURL == 'yesterday') ? Yii::t('app', 'Today') : '' ?>
                    <?= ($dayNameURL == 'tomorrow') ? Yii::$app->formatter->asDate($date->next, 'medium') : '' ?>
                <?php else: ?>
                    <?php if ($date->next == $dateToday->next) : ?>
                        <?= Yii::t('app', 'Tomorrow') ?>
                    <?php elseif ($date->next == $dateToday->previous): ?>
                        <?= Yii::t('app', 'Yesterday') ?>
                    <?php elseif ($date->next == $dateToday->current): ?>
                        <?= Yii::t('app', 'Today') ?>
                    <?php else: ?>
                        <?= Yii::$app->formatter->asDate($date->next, 'medium') ?>
                    <?php endif; ?>

                <?php endif; ?>
            </a>
        <?php endif; ?>
    </div>
</div>
<hr>
<br>
<?php /***************************** */ ?>
<?php /***************************** Список всех праздников*/ ?>
<?php /***************************** */ ?>

<?php if ($holidaysData): ?>
    <a name="holidays-and-weekends"></a>


    <?php if ($dayNameURL == 'today') : ?>
        <?php if ($countryData) : ?>
            <h2 class="main-page-h1">
                <?= Yii::t('app', 'What are the holidays today {date} {country-in}', [
                    'date' => Yii::$app->formatter->asDate($date->current, 'd MMMM Y'),
                    'country-in' => $countryData['name_in'],
                ]) ?>
            </h2>
        <?php else: ?>
            <h2 class="main-page-h1">
                <?= Yii::t('app', 'What are the holidays today {date} in the world', [
                    'date' => Yii::$app->formatter->asDate($date->current, 'd MMMM Y'),
                ]) ?>
            </h2>

        <?php endif; ?>

    <?php endif; ?>
    <?php if ($dayNameURL == 'tomorrow') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'What are the holidays will be tomorrow {date} in the world', [
                'date' => Yii::$app->formatter->asDate($date->current, 'd MMMM Y'),
            ]) ?>
        </h2>
    <?php endif; ?>
    <?php if ($dayNameURL == 'yesterday') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'What are the holidays were yesterday {date} in the world', [
                'date' => Yii::$app->formatter->asDate($date->current, 'd MMMM Y'),
            ]) ?>
        </h2>
    <?php endif; ?>
    <?php if ($dayNameURL == '') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'What are the holidays on {date} in the world', [
                'date' => Yii::$app->formatter->asDate($date->current, 'd MMMM Y'),
            ]) ?>
        </h2>
    <?php endif; ?>

    <br><br>
<?php endif; ?>

<?php if ($holidaysNearest) : ?>
    <h2 class="main-page-h1">
        <?= Yii::t('app', 'Upcoming holidays {country_in} in {year}', [
            'year' => $date->year->current,
            'country_in' => $countryData['name_in'],
        ]) ?>
    </h2>
    <br><br>
<?php endif; ?>


<?php if ($holidaysData or $holidaysNearest): ?>
    <?php if (!$holidaysData) : ?>
        <?php $holidaysData = $holidaysNearest ?>
    <?php endif; ?>
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


