<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $dateData common\components\date\DateData
 * @var $countriesData common\components\countries\CountriesData
 * @var $holidaysData common\components\holidays\HolidaysByCountryByYear array
 * @var $holidaysTypesData common\components\holidaysTypes\HolidaysTypesData
 * @var $countryData common\components\country\CountryData
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths
 * @var $calendarNameOfDaysInWeek common\components\calendar\CalendarNameOfDaysInWeek
 * @var $PDFCalendarsData common\components\PDFCalendars\PDFCalendarsYearlyExists
 */


?><a name="calendar-<?= $dateData['year']['current'] ?>"></a><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><br><br><div class=row><?php /** Сегодняшний год */ ?><div class="col-xxs-12 col-xs-6 current-date"><div class=current-date-div><div class=current-date-one><div class=current-date-year><?= $dateData['year']['current'] ?><br><span class=current-date-month><?= Yii::t('app', 'year'); ?></span></div></div><div class=current-date-text><?= Yii::$app->params['text']['text1'] ?></div></div></div><?php /** Выберите страну */ ?><div class="col-xxs-12 col-xs-6 c-links-mp"><div class="c-links-block c-links-mp-header c-links-mp-header-link"><?= Yii::t('app', 'Choose the country'); ?></div><div class=c-links-block><form id=form><div class=form-group><select class=form-control name=country onchange='$("#form").submit()'><option><?= $countryData['name'] ?></option><?php foreach ($countriesData as $country) : ?><option value="<?= $country['id'] ?>"><?= $country['name'] ?></option><?php endforeach; ?></select></div></form></div><div class=c-links-block><hr></div><div class=c-links-block><div class="col-xs-6 c-links-mp-months"><a href="/<?= Yii::$app->language ?>/calendar/seasons/winter/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Winter') ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/seasons/spring/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Spring') ?></a><br></div><div class="col-xs-6 c-links-mp-months"><a href="/<?= Yii::$app->language ?>/calendar/seasons/summer/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Summer') ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/seasons/autumn/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Autumn') ?></a><br></div></div><div class=c-links-block><hr class=hr-1></div></div></div><br><br><hr><?php
/**
 * Верхняя плашка календаря с годами туда сюда
 */
?><div class=row><div class="col-xxs-12 col-xs-4 c-prev-next-left"><a href="/calendar/years/<?= $dateData['year']['previous'] ?>/"><?= $dateData['year']['previous'] ?></a></div><div class="col-xxs-12 col-xs-4 c-prev-next-center"><?= $dateData['year']['current'] ?></div><div class="col-xxs-12 col-xs-4 c-prev-next-right"><a href="/calendar/years/<?= $dateData['year']['next'] ?>/"><?= $dateData['year']['next'] ?></a></div></div><hr><?php
/**
 * Календарь с отмеченными праздниками конкретнрой страны
 */
?><div class="rflex year"><?php
        $countMonths = 0;
        $countWeeks = 0;
        foreach ($calendarByYear as $months) :?><?php $countMonths++; ?><div class="col-xxs-12 col-xs-6 col-md-3 col-sm-4 month"><div class=month-name><span class="fa fa-calendar"></span> <a href="/calendar/months/<?= $dateData['year']['current'] ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/"><?= $calendarNameOfMonths[$countMonths]; ?></a></div><div class=week-name><?php for ($i = 1; $i <= 7; $i++): ?><div class=day-name><?= $calendarNameOfDaysInWeek[$i]; ?></div><?php endfor; ?></div><?php foreach ($months as $week): ?><div class=week><?php for ($i = 1; $i <= 5; $i++): ?><?php if (isset($week[$i]['monthDay'])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?><div class=day-holiday data-title="<?= $holidaysData[$key]['name'] ?>"><span><?= $week[$i]['monthDay']; ?></span></div><?php else: ?><div class=day><span><?= $week[$i]['monthDay']; ?></span></div><?php endif; ?><?php else: ?><div class=no-day><span></span></div><?php endif; ?><?php endfor; ?><?php for ($i = 6; $i <= 7; $i++): ?><?php if (isset($week[$i]['monthDay'])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?><div class=day-holiday data-title="<?= $holidaysData[$key]['name'] ?>"><span><?= $week[$i]['monthDay']; ?></span></div><?php else: ?><div class=day-off><span><?= $week[$i]['monthDay']; ?></span></div><?php endif; ?><?php else: ?><div class=no-day><span></span></div><?php endif; ?><?php endfor; ?></div><?php endforeach; ?></div><?php endforeach; ?></div><br><hr><br><?php
/**
 * Список всех праздников конкретной страны
 */
?><?php if ($holidaysData): ?><a name="calendar-of-holidays-and-weekends-in-<?= $dateData['year']['current'] ?>-<?= $countryData['name_en'] ?>"></a><h2 class=main-page-h1><?= Yii::t('app', 'Calendar of holidays and weekends in {year} {country_for}', [
            'country_for' => $countryData['name_for'],
            'year' => $dateData['year']['current'],
        ]) ?></h2><br><br><div class="row rflex"><?php foreach ($holidaysData as $holiday) : ?><?php $dateFormat = new \DateTime($holiday['date']) ?><div class="col-xxs-12 col-xs-6 col-md-4 holidays-names-line"><div class="holidays-color-square-<?= $holiday['holiday'] == 1 ? 'green' : 'gray' ?>"></div><?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>&nbsp;<?= $holiday['name']; ?><?php //(new \common\components\dump\Dump())->printR($holiday['holiday_types']);?></div><?php endforeach; ?></div><br><hr><?php endif; ?><?php
/**
 * Ссылки на PDF календари
 */
?><?php if ($PDFCalendarsData['exists']): ?><br><?php if ($holidaysData): ?><a name="download-calendar-<?= $dateData['year']['current'] ?>"></a><h2 class=main-page-h1><?= Yii::t('app', 'Download and print the calendar with holidays and weekends for {year} {country_for}', [
                'country_for' => $countryData['name_for'],
                'year' => $dateData['year']['current'],
            ]) ?></h2><?php else: ?><a name="download-calendar-<?= $dateData['year']['current'] ?>"></a><h2 class=main-page-h1><?= Yii::t('app', 'Download and print the calendar for {year}', [
                'year' => $dateData['year']['current'],
            ]) ?></h2><?php endif; ?><br><br><div class=row><?php foreach ($PDFCalendarsData['pdf'] as $key => $pdf): ?><?php if ($pdf['pdfExists']):?><div class="col-xxs-12 col-xs-6 col-md-4 d-center"><img alt=""class=c-download-img src="<?= $pdf['imgPathRelative'] ?>"width=100%> <a href="<?= $pdf['pdfPathRelative'] ?>"class="btn btn-success c-download-button"download><?= Yii::t('app', 'Скачать календарь на 2020 год') ?></a><a href="<?= $pdf['pdfPathRelative'] ?>"class="btn btn-success c-download-button"><?= Yii::t('app', 'Распечатать календарь на 2020 год') ?></a></div><?php endif;?><?php endforeach; ?></div><?php else: ?><?php endif; ?>