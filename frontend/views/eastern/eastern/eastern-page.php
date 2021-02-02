<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 *
 * @var $date common\components\date\Date
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
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[1]; ?>.png" alt="<?= $eastern->animals->names[1]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[1]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[2]; ?>.png" alt="<?= $eastern->animals->names[2]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[2]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[3]; ?>.png" alt="<?= $eastern->animals->names[3]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[3]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[4]; ?>.png" alt="<?= $eastern->animals->names[4]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[4] ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[5]; ?>.png" alt="<?= $eastern->animals->names[5]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[5]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[6]; ?>.png" alt="<?= $eastern->animals->names[6]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[6]; ?>
                    </a>
                </div>
            </div>
            <div class="col-xs-6 c-links-mp-months">
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[7]; ?>.png" alt="<?= $eastern->animals->names[7]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[7]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[8]; ?>.png" alt="<?= $eastern->animals->names[8]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[8]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[9]; ?>.png" alt="<?= $eastern->animals->names[9]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[9]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[10]; ?>.png" alt="<?= $eastern->animals->names[10]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[10]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[11]; ?>.png" alt="<?= $eastern->animals->names[11]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[11]; ?>
                    </a>
                </div>
                <div>
                    <img class="eastern-pic" width="20"
                         src="/pictures/eastern-animals/<?= $eastern->animals->pictures[12]; ?>.png" alt="<?= $eastern->animals->names[12]; ?>">
                    <a href="">
                        <?= $eastern->animals->names[12]; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row rflex year">
    <?php foreach ($eastern->calendar->years as $year => $data): ?>
        <div class="col-xxs-4 col-xs-2 col-sm-2 col-md-1 eastern-one-peace">
            <div>
                <img class="eastern-pic" width="40"
                     src="/pictures/eastern-animals/<?= $eastern->animals->pictures[$data['animal']]; ?>-green.png"
                     alt="">
                <br>
                <?= $eastern->elements->colors[$data['color']]?>
                <br>
                <?= $eastern->elements->elements[$data['element']]?>
            </div>
            <div>
                <a class="eastern-year-link" href=""><?= $year ?></a>
            </div>
        </div>
    <?php endforeach ?>
</div>

<hr>







