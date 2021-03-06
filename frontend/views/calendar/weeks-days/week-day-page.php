<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $dateData common\components\date\DateData
 * @var $date common\componentsV2\date\Date
 * @var $dateToday common\componentsV2\date\Date
 * @var $holidaysTypesData common\components\holidaysTypes\HolidaysTypesData
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths
 * @var $calendarNameOfDaysInWeek common\components\calendar\CalendarNameOfDaysInWeek
 * @var $PDFCalendarsData common\components\PDFCalendars\PDFCalendarsYearlyExists
 * @var $getParamsByCalendarYears common\components\getParams\GetParamsByCalendarYears
 * @var $holidaysRange common\components\holidays\HolidaysRange
 */

$moon = new \common\components\moon\Moon();
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
                <div class="current-date-year current-date-big">
                    <?= $date->week->current ?>

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
                <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Calendar with week numbers'); ?>
                </a>
                <?= ' / ' ?>
                <a href="/<?= Yii::$app->language ?>/calendar/days/today/">
                    <?= Yii::t('app', 'Today') ?>
                </a>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-01/"><?= $calendarNameOfMonths[1] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-02/"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-03/"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-04/"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-05/"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-06/"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-07/"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-08/"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-09/"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-10/"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-11/"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-12/"><?= $calendarNameOfMonths[12] ?></a><br>
                </div>
            </div>
            <div class="plate-links">
                <hr>
            </div>

            <div class="plate-links">
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/winter/<?= $date->year->current ?>/"><?= Yii::t('app', 'Winter') ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/spring/<?= $date->year->current ?>/"><?= Yii::t('app', 'Spring') ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/summer/<?= $date->year->current ?>/"><?= Yii::t('app', 'Summer') ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/autumn/<?= $date->year->current ?>/"><?= Yii::t('app', 'Autumn') ?></a><br>

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
            <?php foreach (range(1, $date->week->count) as $oneWeek): ?>
                <?php if ($date->week->current == $oneWeek) : ?>
                    <a class="plate-piece-current" href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/
                    <?= str_pad($oneWeek, 2, '0', STR_PAD_LEFT) ?>/
                    ">
                        <?= $oneWeek ?>
                    </a>

                <?php else: ?>
                <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/
                    <?= str_pad($oneWeek, 2, '0', STR_PAD_LEFT) ?>/
                    ">
                    <?= $oneWeek ?>
                </a>
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
        <?php if ($date->current == '2000-01-01') : ?>
        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/weeks/days/
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
            <a href="/<?= Yii::$app->language ?>/calendar/weeks/days/
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
<?php /***************************** Неделя в виде одного или 2х месяцев*/ ?>
<?php /***************************** */ ?>

<div class="row rflex year">

    <?php foreach ($calendarByWeek['monthByWeek'] as $month): ?>
    <?php //(new \common\components\dump\Dump())->printR($month);die;?>

    <div class="owmonth col-xxs-12 col-xs-12 col-sm-6">
        <div class="owmonth-name">
            <span class="fa fa-calendar">
                </span>
            <a class=""
               href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-<?= str_pad($month['month'], 2, '0', STR_PAD_LEFT) ?>/">
                <?= $calendarNameOfMonths[$month['month']]; ?>
            </a>

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
        <?php foreach ($calendarByWeek['calendar'][$month['year']][$month['month']] as $keyMain => $week): ?>


    <?php $countWeeks++ ?>
    <?php //(new \common\components\dump\Dump())->printR($key);
    //(new \common\components\dump\Dump())->printR($weekURL['simple']);
    ?>
    <?php if ($keyMain == $date->week->simple): ?>
        <div class="owweek owweek-border">
            <?php else: ?>
            <div class="owweek">
                <?php endif; ?>

                <div class="owno-day <?= ($keyMain == $date->week->simple) ? ' wday-week-color' : '' ?> ">
                            <span>
                                <?php if ($countWeeks == 1 && $keyMain > 50): ?>
                                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->previous ?>/<?= $keyMain; ?>/">
                                        <?= $keyMain; ?>
                                    </a>
                                <?php else: ?>
                                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/<?= $keyMain; ?>/">
                                        <?= $keyMain; ?>
                                    </a>
                                <?php endif; ?>
                            </span>
                </div>
                <?php for ($i = 1; $i <= 5; $i++): ?>

                    <?php if (isset($week[$i]['monthDay'])): ?>


                        <div class="owday <?= ($keyMain == $date->week->simple) ? ' wday-week-color' : '' ?>
                            <?= ($week[$i]['date'] == $date->current) ? ' mday-current' : '' ?>">

                            <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                        </div>

                    <?php else: ?>
                        <div class="owno-day <?= ($keyMain == $date->week->simple) ? ' wday-week-color' : '' ?>">
                            <span>

                            </span>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php for ($i = 6; $i <= 7; $i++): ?>
                    <?php if (isset($week[$i]['monthDay'])): ?>

                        <div class="owday-off <?= ($keyMain == $date->week->simple) ? ' wday-week-color' : '' ?>
                                    <?= ($week[$i]['date'] == $date->current) ? ' mday-current' : '' ?>">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                        </div>

                    <?php else: ?>
                        <div class="owno-day <?= ($keyMain == $date->week->simple) ? ' wday-week-color' : '' ?>">
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

