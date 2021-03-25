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


?><a name=eastern-calendar></a><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><hr><div class=row><?php /***************************** */ ?><?php /***************************** Сегодняшний год*/ ?><?php /***************************** */ ?><div class="col-xs-6 col-xxs-12 current-date"><div class=current-date-div><div class=current-date-one><div class=current-date-year><img alt=""class=eastern-pic src="/pictures/eastern-animals/<?= $eastern->animals->pictures[$eastern->calendar->year['animal']]; ?>.png"width=80> <span class=current-date-month></span></div></div><div class=current-date-text><?= Yii::$app->params['text']['text1'] ?></div></div></div><div class="col-xs-6 col-xxs-12 plates"><div class=plate><div class=plate-header><a href="/<?= Yii::$app->language ?>/calendar/eastern/"><?= Yii::t('app', 'Eastern calendar'); ?></a></div><div class=plate-links><div class="col-xs-6 c-links-mp-months"><?php foreach (range(1, 6) as $id): ?><div><img alt="<?= $eastern->text->names[$id]; ?>"class=eastern-pic src="/pictures/eastern-animals/<?= $eastern->animals->pictures[$id]; ?>.png"width=25> <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[$id] ?>/"><?= $eastern->text->names[$id]; ?></a></div><?php endforeach ?></div><div class="col-xs-6 c-links-mp-months"><?php foreach (range(7, 12) as $id): ?><div><img alt="<?= $eastern->text->names[$id]; ?>"class=eastern-pic src="/pictures/eastern-animals/<?= $eastern->animals->pictures[$id]; ?>.png"width=25> <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[$id] ?>/"><?= $eastern->text->names[$id]; ?></a></div><?php endforeach ?></div></div></div></div></div><div class="row rflex"><div class="col-xxs-12 plates"><div class=plate-long><?php $linksCount = 0 ?><?php foreach ($calendars->links as $link): ?><?php $linksCount++ ?><a href="<?= $link['url'] ?>"class=plate-a-margin><?= $link['name'] ?></a><?php if ($linksCount == count($calendars->links)) : ?><?php else: ?><?= ' / ' ?><?php endif; ?><?php endforeach ?></div></div></div><hr><div class="row rflex"><div class="col-xxs-12 eastern-year"><h2><?= Yii::t('app', '{animal} according to the Eastern Chinese calendar for other years', [
                'animal' => $eastern->text->names[$eastern->calendar->year['animal']],
                '' => '',
            ]); ?>:</h2><br><br></div><div class="col-xxs-12 eastern-years-div"><?php foreach ($eastern->calendar->years as $year => $data): ?><?php if ($data['animal'] == $eastern->animal->id) : ?><div class="col-xs-6 col-sm-3 col-xs-4 col-xxs-6 eastern-years"><div class=eastern-years-inside><a href="/calendar/eastern/years/<?= $year ?>/"class=eastern-year-link><?= $year ?></a><br><?= Yii::t('app', 'Color:') ?><?= ' ' . $eastern->text->colors[$data['color']] ?><br><?= Yii::t('app', 'Element:') ?><?= ' ' . $eastern->text->elements[$data['element']] ?><br><?php if ($data['startDate']) : ?><br><?= Yii::t('app', 'Year starts') ?><?= ' ' . Yii::$app->formatter->asDate($data['startDate'], 'medium') . ' ' ?><?= Yii::t('app', 'and ends') ?><?= ' ' . Yii::$app->formatter->asDate($data['endDate'], 'medium') ?><br><?php endif; ?></div></div><?php endif; ?><?php endforeach ?></div></div><br><br><hr><br><br><div class="row rflex year"><?php foreach ($eastern->calendar->years as $year => $data): ?><div class="col-md-1 col-sm-2 col-xs-2 col-xxs-4 eastern-one-peace"><div><img alt=""class=eastern-pic src="/pictures/eastern-animals/<?= $eastern->animals->pictures[$data['animal']]; ?>.png"width=40><br><?= $eastern->text->colors[$data['color']] ?><br><?= $eastern->text->elements[$data['element']] ?></div><div><a href="/calendar/eastern/years/<?= $year ?>/"class=eastern-year-link><?= $year ?></a></div></div><?php endforeach ?></div><hr>