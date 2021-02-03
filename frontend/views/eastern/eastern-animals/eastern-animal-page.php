<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 *
 * @var $date common\componentsV2\date\Date
 * @var $eastern common\componentsV2\eastern\Eastern
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
                         src="/pictures/eastern-animals/<?= $eastern->animal->picture; ?>-green.png"
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
    <div class="col-xxs-12 col-xs-6 c-links-mp">
        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months">
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[1]; ?>.png"
                         alt="<?= $eastern->text->names[1]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[1] ?>/">
                        <?= $eastern->text->names[1]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[2]; ?>.png"
                         alt="<?= $eastern->text->names[2]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[2] ?>/">
                        <?= $eastern->text->names[2]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[3]; ?>.png"
                         alt="<?= $eastern->text->names[3]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[3] ?>/">
                        <?= $eastern->text->names[3]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[4]; ?>.png"
                         alt="<?= $eastern->text->names[4]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[4] ?>/">
                        <?= $eastern->text->names[4] ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[5]; ?>.png"
                         alt="<?= $eastern->text->names[5]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[5] ?>/">
                        <?= $eastern->text->names[5]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[6]; ?>.png"
                         alt="<?= $eastern->text->names[6]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[6] ?>/">
                        <?= $eastern->text->names[6]; ?>
                    </a>
                </div>
            </div>
            <div class="col-xs-6 c-links-mp-months">
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[7]; ?>.png"
                         alt="<?= $eastern->text->names[7]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[7] ?>/">
                        <?= $eastern->text->names[7]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[8]; ?>.png"
                         alt="<?= $eastern->text->names[8]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[8] ?>/">
                        <?= $eastern->text->names[8]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[9]; ?>.png"
                         alt="<?= $eastern->text->names[9]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[9] ?>/">
                        <?= $eastern->text->names[9]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[10]; ?>.png"
                         alt="<?= $eastern->text->names[10]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[10] ?>/">
                        <?= $eastern->text->names[10]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[11]; ?>.png"
                         alt="<?= $eastern->text->names[11]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[11] ?>/">
                        <?= $eastern->text->names[11]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[12]; ?>.png"
                         alt="<?= $eastern->text->names[12]; ?>">
                    <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[12] ?>/">
                        <?= $eastern->text->names[12]; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<br>
<div class="row rflex">

    <div class="eastern-year col-xxs-12">
        <h2>
            <?= Yii::t('app', '{animal} by Years of the Eastern Chinese Calendar', [
                'animal' => $eastern->animal->name,
            ]); ?>
        </h2>
        <br><br>
    </div>
    <div class="eastern-years-div col-xxs-12">

        <?php foreach ($eastern->calendar->years as $year => $data): ?>
            <?php if ($data['animal'] == $eastern->animal->id) : ?>
                <div class="eastern-years col-xxs-6 col-xs-6 col-xs-4 col-sm-3">
                    <div class="eastern-years-inside">
                        <a class="eastern-year-link" href="/calendar/eastern/years/<?= $year ?>/"><?= $year ?></a><br>
                        <?= Yii::t('app', 'Color:') ?><?= ' ' . $eastern->text->colors[$data['color']] ?><br>
                        <?= Yii::t('app', 'Element:') ?><?= ' ' . $eastern->text->elements[$data['element']] ?><br>
                        <?php if ($data['startDate']) : ?>
                            <br><?= Yii::t('app', 'Year starts') ?> <?= ' ' . Yii::$app->formatter->asDate($data['startDate'], 'medium') . ' '?>
                            <?= Yii::t('app', 'and ends') ?> <?= ' ' . Yii::$app->formatter->asDate($data['endDate'], 'medium') ?><br>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach ?>

    </div>
</div>
<br><br>
<hr>
<br><br>
<div class="row rflex year">
    <?php foreach ($eastern->calendar->years as $year => $data): ?>
        <div class="col-xxs-4 col-xs-2 col-sm-2 col-md-1 eastern-one-peace">
            <div>
                <img class="eastern-pic" width="40"
                     src="/pictures/eastern-animals/<?= $eastern->animals->pictures[$data['animal']]; ?>-green.png"
                     alt="">
                <br>
                <?= $eastern->text->colors[$data['color']] ?>
                <br>
                <?= $eastern->text->elements[$data['element']] ?>
            </div>
            <div>
                <a class="eastern-year-link" href="/calendar/eastern/years/<?= $year ?>/"><?= $year ?></a>
            </div>
        </div>
    <?php endforeach ?>
</div>

<hr>







