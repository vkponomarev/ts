<?php

/**
 * @var $this frontend\controllers\MainPageController
 *
 * @var $date common\componentsV2\date\Date
 * @var $countries common\components\countries\CountriesByPopulation
 * @var $holidays common\components\holidays\HolidaysByDay
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths
 * @var $calendarByYear common\components\calendar\CalendarByYear
 */


?>

<a name="calendar-<?= $date->year->current ?>"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<div class="row rflex">

    <?php /***************************** */ ?>
    <?php /***************************** Сегодняшнее число */ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 current-date">
        <div class="current-date-div">
            <div class="current-date-one">
                <div class="current-date-date">
                    <a class="current-date-link"
                       href="/<?= Yii::$app->language ?>/calendar/days/today/">
                        <?= Yii::$app->formatter->asDate($date->current, 'd'); ?>
                        <br>
                        <span class="current-date-month">
                    <?= Yii::$app->formatter->asDate($date->current, 'MMMM'); ?>
                </span>
                    </a>
                </div>
            </div>

            <div class="current-date-text">
                <br>
                <?= $date->day->name ?>,
                <?= ' ' . Yii::t('app', '{day} day', ['day' => $date->day->count]); ?>,
                <?= ' ' . Yii::t('app', '{week} week', ['week' => $date->week->count]); ?>
                <?= ' ' . $date->year->current ?>.

                <?php if ($date->year->leap): ?>
                    <?= ' ' . Yii::t('app', 'Leap year'); ?>.
                <?php else: ?>
                    <?= ' ' . Yii::t('app', 'Not a leap year'); ?>.
                <?php endif; ?>
            </div>
        </div>
    </div>


    <?php /***************************** */ ?>
    <?php /***************************** Сегодня */ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 plates">

        <div class="plate">
            <div class="plate-header">
                <a href="/<?= Yii::$app->language ?>/calendar/days/today/">
                    <?= Yii::t('app', 'Today'); ?>
                </a>
            </div>
            <div class="plate-links">
                <?php $holidaysCount = 0; ?>
                <?php foreach ($holidays as $holiday): ?>
                    <?php $holidaysCount++; ?>
                    <a href="/<?= Yii::$app->language ?>/holidays/<?= $holiday['holidayUrl'] ?>/">
                        <?= $holiday['holidayName'] ?>
                    </a>
                    <?= ' / ' ?>
                    <a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/<?= $holiday['countryUrl'] ?>/">
                        <?= $holiday['countryName'] ?>
                    </a>
                    <?php if ($holidaysCount >= 8) {
                        break;
                    } ?>
                <?php endforeach ?>
                <?php if ($holidaysCount < 4) : ?>
                    <div class="plate-links">
                        <hr>
                    </div>
                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/days/today/">
                        <?= Yii::t('app', 'What day of the week is {date}', [
                            'date' => Yii::t('app', 'today')
                        ]) ?>
                    </a>
                    <br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/days/today/">
                        <?= Yii::t('app', 'What is the zodiac sign {day-name}', [
                            'day-name' => Yii::t('app', 'today')
                        ]) ?>
                    </a>
                    <br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/days/today/">
                        <?= Yii::t('app', 'What lunar day {day-name}', [
                            'day-name' => Yii::t('app', 'today')
                        ]) ?>
                    </a>
                    <br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phases/days/today/">
                        <?= Yii::t('app', 'What is the phase of the moon {day-name}', [
                            'day-name' => Yii::t('app', 'today')
                        ])
                        ?>
                    </a>
                    <br>
                    <a href="/<?= Yii::$app->language ?>/holidays/days/today/">
                        <?= Yii::t('app', 'What are the holidays {day-name}', [
                            'day-name' => Yii::t('app', 'today')
                        ])
                        ?>
                    </a>
                <?php endif; ?>

            </div>

        </div>

    </div>

    <?php /***************************** */ ?>
    <?php /***************************** Календарь на год */ ?>
    <?php /***************************** */ ?>


    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 plates">
        <div class="plate">
            <div class="plate-header">
                <a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', '{year} calendar', ['year' => $date->year->current]); ?>
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


    <?php /***************************** */ ?>
    <?php /**************************** Праздники */ ?>
    <?php /***************************** */ ?>
    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 plates">
        <div class="plate">
            <div class="plate-header">
                <a href="/<?= Yii::$app->language ?>/holidays/years/2021/">
                    <?= Yii::t('app', 'Holidays'); ?>
                </a>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col">
                    <?php $countriesCount = 0 ?>
                    <?php foreach ($countries as $country): ?>
                        <?php $countriesCount++ ?>
                        <a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/<?= $country['url'] ?>/">
                            <?= $country['name'] ?>
                        </a><br>
                        <?php if ($countriesCount == 8) break ?>
                    <?php endforeach ?>

                </div>
                <div class="col-xs-6 plate-links-col">
                    <?php $countriesCount = 0 ?>
                    <?php foreach ($countries as $country): ?>
                        <?php $countriesCount++ ?>
                        <?php if ($countriesCount <= 8) continue ?>
                        <a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/<?= $country['url'] ?>/">
                            <?= $country['name'] ?>
                        </a><br>

                    <?php endforeach ?>

                </div>
            </div>

        </div>
    </div>

    <?php /***************************** */ ?>
    <?php /***************************** Другие календари */ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 plates">

        <div class="plate">
            <div class="plate-header">

                <?= Yii::t('app', 'Other calendars'); ?>

            </div>
            <div class="plate-links">
                <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Calendar with week numbers'); ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Business days calendar'); ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Lunar Calendar'); ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/eastern/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Eastern calendar'); ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/zodiac/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Zodiac signs calendar'); ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/religion/orthodox/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Orthodox calendar') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/religion/catholic/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Catholic calendar') ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/religion/muslim/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Muslim calendar') ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/religion/jewish/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Jewish calendar') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/religion/hindu/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Hindu calendar') ?>
                </a>
            </div>


        </div>
    </div>

    <?php /***************************** */ ?>
    <?php /***************************** Другое */ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 plates">

        <div class="plate">
            <div class="plate-header">

                <?= Yii::t('app', 'Other'); ?>

            </div>
            <div class="plate-links">
                <a href="/<?= Yii::$app->language ?>/calendar/working/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Working days') ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/days-off/years/
                <?= $date->year->current ?>/"><?= Yii::t('app', 'Days off') ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Auspicious days') ?>
                </a>
                <br>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Sowing calendar') ?>
                </a>
            </div>


        </div>
    </div>

</div>

<hr>

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
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
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