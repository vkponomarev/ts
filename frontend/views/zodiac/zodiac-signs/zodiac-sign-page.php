<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 *
 * @var $date common\componentsV2\date\Date
 * @var $zodiacs common\componentsV2\zodiacs\Zodiacs
 * @var $planets common\componentsV2\planets\Planets
 * @var $elements common\componentsV2\elements\Elements
 * @var $stones common\componentsV2\stones\Stones
 * @var $mascots common\componentsV2\mascots\Mascots
 * @var $colors common\componentsV2\colors\Colors
 *
 *
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
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


<a name="calendar"></a><h1
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

                    <img class="eastern-pic" width="80"
                         src="/pictures/zodiac/<?= $zodiacs->zodiac->picture; ?>.png"
                         alt="<?= Yii::$app->params['text']['h1'] ?>">

                    <span class="current-date-month">

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
                <a href="/<?= Yii::$app->language ?>/calendar/zodiac/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Zodiac signs calendar'); ?>
                </a>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-01/"><?= $calendarNameOfMonths[1] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-02/"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-03/"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-04/"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-05/"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-06/"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-07/"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-08/"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-09/"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-10/"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-11/"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-12/"><?= $calendarNameOfMonths[12] ?></a><br>
                </div>
            </div>
            <div class="plate-links">
                <hr>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/zodiac/">
                        <?= Yii::t('app', 'Zodiac signs') ?>
                    </a>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/days/today/">
                        <?= Yii::t('app', 'Zodiac sign today') ?>
                    </a>
                </div>
            </div>
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
            <?php foreach (range(1, 12) as $zodiacID): ?>
                <img class="eastern-pic" width="20"
                     src="/pictures/zodiac/<?= $zodiacs->pictures[$zodiacID]; ?>.png"
                     alt="<?= $zodiacs->texts->namesCapital[$zodiacID]; ?>">
                <?php if ($zodiacs->zodiac->id == $zodiacID) : ?>
                    <a class="plate-piece-current" href="/<?= Yii::$app->language ?>/zodiac/<?= $zodiacs->urls->ids[$zodiacID]; ?>/">
                        <?= $zodiacs->texts->namesCapital[$zodiacID]; ?>
                    </a>
                <?php else: ?>

                    <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/zodiac/<?= $zodiacs->urls->ids[$zodiacID]; ?>/">
                        <?= $zodiacs->texts->namesCapital[$zodiacID]; ?>
                    </a>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
<hr>
<br>
<?php /***************************** */ ?>
<?php /***************************** Календарь с отмеченными праздниками конкретнрой страны*/ ?>
<?php /***************************** */ ?>
<?php
$mass = ['calendar2', 'calendar']
?>
<div class="row rflex year">

    <?php foreach ($mass as $calendarName): ?>
        <?php if ($calendarName == 'calendar2' && $zodiacs->zodiac->id <> 10) : ?>
            <?php continue; ?>
        <?php endif; ?>
        <?php foreach ($calendarByWeek[$calendarName] as $monthCount => $month): ?>
            <?php //(new \common\components\dump\Dump())->printR($month);die;?>

            <div class="owmonth col-xxs-12 col-xs-12 col-sm-6">
                <div class="owmonth-name">
            <span class="fa fa-calendar">
                </span>
                    <a class=""
                       href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-<?= str_pad($monthCount, 2, '0', STR_PAD_LEFT) ?>/">
                        <?= $calendarNameOfMonths[$monthCount]; ?>
                    </a>
                    <?php if ($calendarName == 'calendar2') : ?>
                        <?php if ($calendarByWeek['signID'] == 10) : ?>
                            <?php if ($monthCount == 1) : ?>
                                <?= ' ' . $date->year->current ?>
                            <?php endif; ?>
                            <?php if ($monthCount == 12) : ?>
                                <?= ' ' . $date->year->previous ?>
                            <?php endif; ?>

                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($calendarName == 'calendar') : ?>
                        <?php if ($calendarByWeek['signID'] == 10) : ?>
                            <?php if ($monthCount == 1) : ?>
                                <?= ' ' . $date->year->next ?>
                            <?php endif; ?>
                            <?php if ($monthCount == 12) : ?>
                                <?= ' ' . $date->year->current ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($calendarByWeek['signID'] <> 10) : ?>
                        <?= ' ' . $date->year->current ?>
                    <?php endif; ?>


                </div>
                <div class="owweek-name">
                    <div class="owday-name">
                        #
                    </div>
                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <div class="owday-name">
                            <?= $calendarNameOfDaysInWeek[$i]; ?>
                        </div>
                    <?php endfor; ?>
                </div>
                <?php $countWeeks = 0; ?>
                <?php foreach ($month as $keyMain => $week): ?>


                    <?php $countWeeks++ ?>
                    <?php //(new \common\components\dump\Dump())->printR($key);
                    //(new \common\components\dump\Dump())->printR($weekURL['simple']);
                    ?>

                    <div class="zweek">


                        <div class="owno-day">
                            <span>
                                <?php if ($calendarName == 'calendar' && $calendarByWeek['signID'] == 10) : ?>


                                <?php else: ?>
                                    <?php if ($countWeeks == 1 && $keyMain > 50): ?>
                                        <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->previous ?>/<?= $keyMain; ?>/">
                                        <?= $keyMain; ?>
                                    </a>
                                    <?php else: ?>
                                        <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/<?= $keyMain; ?>/">
                                        <?= $keyMain; ?>
                                    </a>
                                    <?php endif; ?>

                                <?php endif; ?>

                            </span>
                        </div>
                        <?php for ($i = 1; $i <= 5; $i++): ?>

                            <?php if (isset($week[$i]['monthDay'])): ?>


                                <div class="owday">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>

                                        <?php if ($week[$i]['zodiacID']) : ?>
                                            <br>

                                            <img class="" width="18"
                                                 src="/pictures/zodiac/<?= $zodiacs->pictures[$week[$i]['zodiacID']] ?>.png"
                                                 alt="">
                                        <?php endif; ?>

                                    </span>
                                </div>


                            <?php else: ?>
                                <div class="owno-day">
                            <span>

                            </span>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php for ($i = 6; $i <= 7; $i++): ?>
                            <?php if (isset($week[$i]['monthDay'])): ?>

                                <div class="owday-off">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                        <?php if ($week[$i]['zodiacID']) : ?>
                                            <br>

                                            <img class="" width="18"
                                                 src="/pictures/zodiac/<?= $zodiacs->pictures[$week[$i]['zodiacID']] ?>.png"
                                                 alt="">
                                        <?php endif; ?>
                                    </span>
                                </div>

                            <?php else: ?>
                                <div class="owno-day">
                            <span>

                            </span>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php endforeach ?>
</div>
<br>
<hr>
<br>

<h2 class="main-page-h2">
    <?= Yii::t('app', 'Planets suitable for the zodiac sign {sign}', [
        'sign' => $zodiacs->zodiac->name ,
    ]) ?>
</h2>

<?php $count = 0; ?>
<?php foreach ($zodiacs->zodiac->planets as $one): ?>
    <div class="zodiac-text">
        <?= ($count <> 0)? ', ' : ''; ?>
        <?= $planets->texts->namesCapital[$one] ?>
    </div>
    <?php $count ++; ?>
<?php endforeach ?>

<hr>
<br>
<h2 class="main-page-h2">
    <?= Yii::t('app', 'Elements of the sign of {sign}', [
        'sign' => $zodiacs->zodiac->name ,
    ]) ?>
</h2>

<?php $count = 0; ?>
<?php foreach ($zodiacs->zodiac->elements as $one): ?>
    <div class="zodiac-text">
        <?= ($count <> 0)? ', ' : ''; ?>
        <?= $elements->texts->namesCapital[$one] ?>
    </div>
    <?php $count ++; ?>
<?php endforeach ?>

<hr>
<br>
<h2 class="main-page-h2">
    <?= Yii::t('app', 'Stones of the zodiac sign {sign}', [
        'sign' => $zodiacs->zodiac->name ,
    ]) ?>
</h2>

<?php $count = 0; ?>
<?php foreach ($zodiacs->zodiac->stones as $one): ?>
    <div class="zodiac-text">
        <?= ($count <> 0)? ', ' : ''; ?>
        <?= $stones->texts->namesCapital[$one] ?>
    </div>
    <?php $count ++; ?>
<?php endforeach ?>


<hr>
<br>
<h2 class="main-page-h2">
    <?= Yii::t('app', 'Mascots of the zodiac sign {sign}', [
        'sign' => $zodiacs->zodiac->name ,
    ]) ?>
</h2>

<?php $count = 0; ?>
<?php foreach ($zodiacs->zodiac->mascots as $one): ?>
    <div class="zodiac-text">
        <?= ($count <> 0)? ', ' : ''; ?>
        <?= $mascots->texts->namesCapital[$one] ?>
    </div>
    <?php $count ++; ?>
<?php endforeach ?>


<hr>
<br>
<h2 class="main-page-h2">
    <?= Yii::t('app', 'Colors of the zodiac sign {sign} ', [
        'sign' => $zodiacs->zodiac->name ,
    ]) ?>
</h2>

<?php $count = 0; ?>
<?php foreach ($zodiacs->zodiac->colors as $one): ?>
    <div class="zodiac-text">
        <?= ($count <> 0)? ', ' : ''; ?>
        <?= $colors->texts->namesCapital[$one] ?>
    </div>
    <?php $count ++; ?>
<?php endforeach ?>
