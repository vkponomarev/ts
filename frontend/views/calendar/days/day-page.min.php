<?php

/**
 * @var $this frontend\controllers\calendar\DaysController
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $date common\componentsV2\date\Date
 * @var $dateToday common\componentsV2\date\Date
 * @var $zodiacs common\componentsV2\zodiacs\Zodiacs
 * @var $dayNameURL string URL today/tomorrow/yesterday
 * @var $holidaysData common\components\holidays\HolidaysByDay
 * @var $holidaysTypesData common\components\holidaysTypes\HolidaysTypesData
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths
 * @var $calendarNameOfDaysInWeek common\components\calendar\CalendarNameOfDaysInWeek
 * @var $PDFCalendarsData common\components\PDFCalendars\PDFCalendarsYearlyExists
 * @var $getParamsByCalendarYears common\components\getParams\GetParamsByCalendarYears
 * @var $holidaysRange common\components\holidays\HolidaysRange
 */

$moon = new \common\components\moon\Moon();
?><a name="calendar-<?= $date->year->current ?>"></a><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><hr><div class=row><?php /***************************** */ ?><?php /***************************** Сегодняшний год*/ ?><?php /***************************** */ ?><div class="col-xs-12 col-sm-6 col-xxs-12 current-date"><div class=current-date-div><div class=current-date-one><div class=current-date-year><?= $date->year->current ?><br><span class=current-date-month><?= Yii::t('app', 'year'); ?></span></div></div><div class=current-date-text><?= Yii::$app->params['text']['text1'] ?></div></div></div><div class="col-xxs-12 col-xs-6 plates"><div class=plate><div class=plate-header><a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/"><?= Yii::t('app', 'Calendar'); ?></a></div><div class=plate-links><div class="col-xs-6 plate-links-col"><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-01/"><?= $calendarNameOfMonths[1] ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-02/"><?= $calendarNameOfMonths[2] ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-03/"><?= $calendarNameOfMonths[3] ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-04/"><?= $calendarNameOfMonths[4] ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-05/"><?= $calendarNameOfMonths[5] ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-06/"><?= $calendarNameOfMonths[6] ?></a><br></div><div class="col-xs-6 plate-links-col"><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-07/"><?= $calendarNameOfMonths[7] ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-08/"><?= $calendarNameOfMonths[8] ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-09/"><?= $calendarNameOfMonths[9] ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-10/"><?= $calendarNameOfMonths[10] ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-11/"><?= $calendarNameOfMonths[11] ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-12/"><?= $calendarNameOfMonths[12] ?></a><br></div></div><div class=plate-links><hr></div><div class=plate-links><div class="col-xs-6 plate-links-col"><a href="/<?= Yii::$app->language ?>/calendar/seasons/winter/<?= $date->year->current ?>/"><?= Yii::t('app', 'Winter') ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/seasons/spring/<?= $date->year->current ?>/"><?= Yii::t('app', 'Spring') ?></a><br></div><div class="col-xs-6 plate-links-col"><a href="/<?= Yii::$app->language ?>/calendar/seasons/summer/<?= $date->year->current ?>/"><?= Yii::t('app', 'Summer') ?></a><br><a href="/<?= Yii::$app->language ?>/calendar/seasons/autumn/<?= $date->year->current ?>/"><?= Yii::t('app', 'Autumn') ?></a><br></div></div></div></div></div><div class="row rflex"><div class="col-xxs-12 plates"><div class=plate-long><?php $linksCount = 0 ?><?php foreach ($calendars->links as $link): ?><?php $linksCount++ ?><a href="<?= $link['url'] ?>"class=plate-a-margin><?= $link['name'] ?></a><?php if ($linksCount == count($calendars->links)) : ?><?php else: ?><?= ' / ' ?><?php endif; ?><?php endforeach ?></div></div></div><hr><?php /***************************** */ ?><?php /***************************** Верхняя плашка календаря с годами туда сюда*/ ?><?php /***************************** */ ?><div class=row><div class="col-xxs-12 col-xs-4 c-prev-next-left"><?php if ($date->current == '2000-01-01') : ?><?php else: ?><a href="/<?= Yii::$app->language ?>/calendar/days/<?php if ($dayNameURL) : ?><?= ($dayNameURL == 'today') ? 'yesterday' : '' ?><?= ($dayNameURL == 'yesterday') ? $date->previous : '' ?><?= ($dayNameURL == 'tomorrow') ? 'today' : '' ?><?php else: ?><?php if ($date->previous == $dateToday->next) : ?><?= 'tomorrow' ?><?php elseif ($date->previous == $dateToday->previous): ?><?= 'yesterday' ?><?php elseif ($date->previous == $dateToday->current): ?><?= 'today' ?><?php else: ?><?= $date->previous ?><?php endif; ?><?php endif; ?>/"><?php if ($dayNameURL) : ?><?= ($dayNameURL == 'today') ? Yii::t('app', 'Yesterday') : '' ?><?= ($dayNameURL == 'yesterday') ? Yii::$app->formatter->asDate($date->previous, 'medium') : '' ?><?= ($dayNameURL == 'tomorrow') ? Yii::t('app', 'Today') : '' ?><?php else: ?><?php if ($date->previous == $dateToday->next) : ?><?= Yii::t('app', 'Tomorrow') ?><?php elseif ($date->previous == $dateToday->previous): ?><?= Yii::t('app', 'Yesterday') ?><?php elseif ($date->previous == $dateToday->current): ?><?= Yii::t('app', 'Today') ?><?php else: ?><?= Yii::$app->formatter->asDate($date->previous, 'medium') ?><?php endif; ?><?php endif; ?></a><?php endif; ?></div><div class="col-xxs-12 col-xs-4 c-prev-next-center"><?php if ($dayNameURL) : ?><?= ($dayNameURL == 'today') ? Yii::t('app', 'Today') : '' ?><?= ($dayNameURL == 'yesterday') ? Yii::t('app', 'Yesterday') : '' ?><?= ($dayNameURL == 'tomorrow') ? Yii::t('app', 'Tomorrow') : '' ?><?php else: ?><?php if ($date->current == $dateToday->next) : ?><?= Yii::t('app', 'Tomorrow') ?><?php elseif ($date->current == $dateToday->previous): ?><?= Yii::t('app', 'Yesterday') ?><?php elseif ($date->current == $dateToday->current): ?><?= Yii::t('app', 'Today') ?><?php else: ?><?= Yii::$app->formatter->asDate($date->current, 'medium') ?><?php endif; ?><?php endif; ?></div><div class="col-xxs-12 col-xs-4 c-prev-next-right"><?php if ($date->current == '2030-12-31') : ?><?php else: ?><a href="/<?= Yii::$app->language ?>/calendar/days/<?php if ($dayNameURL) : ?><?= ($dayNameURL == 'today') ? 'tomorrow' : '' ?><?= ($dayNameURL == 'yesterday') ? 'today' : '' ?><?= ($dayNameURL == 'tomorrow') ? $date->next : '' ?><?php else: ?><?php if ($date->next == $dateToday->next) : ?><?= 'tomorrow' ?><?php elseif ($date->next == $dateToday->previous): ?><?= 'yesterday' ?><?php elseif ($date->next == $dateToday->current): ?><?= 'today' ?><?php else: ?><?= $date->next ?><?php endif; ?><?php endif; ?>/"><?php if ($dayNameURL) : ?><?= ($dayNameURL == 'today') ? Yii::t('app', 'Tomorrow') : '' ?><?= ($dayNameURL == 'yesterday') ? Yii::t('app', 'Today') : '' ?><?= ($dayNameURL == 'tomorrow') ? Yii::$app->formatter->asDate($date->next, 'medium') : '' ?><?php else: ?><?php if ($date->next == $dateToday->next) : ?><?= Yii::t('app', 'Tomorrow') ?><?php elseif ($date->next == $dateToday->previous): ?><?= Yii::t('app', 'Yesterday') ?><?php elseif ($date->next == $dateToday->current): ?><?= Yii::t('app', 'Today') ?><?php else: ?><?= Yii::$app->formatter->asDate($date->next, 'medium') ?><?php endif; ?><?php endif; ?></a><?php endif; ?></div></div><hr><br><div class="row rflex"><div class="col-xs-12 col-sm-6"><div class="col-xs-12 col-sm-6 day-plates"><div class=day-plate><a href="/<?= Yii::$app->language ?>/calendar/weeks/days/<?= ($dayNameURL <> '') ? $dayNameURL : $date->current ?>/"class=day-plate-header><?= Yii::t('app', 'What week is {date}', [
                        'date' => ($dayNameURL <> '') ? Yii::t('app', $dayNameURL) : Yii::$app->formatter->asDate($date->current, 'medium')
                    ]) ?></a><br><br><a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/<?= $date->week->current ?>/"><?= Yii::t('app', '{week} week', [
                        'week' => $date->week->current
                    ]) ?></a></div></div><div class="col-xs-12 col-sm-6 day-plates"><div class=day-plate><a href="/<?= Yii::$app->language ?>/calendar/weeks/days/<?= ($dayNameURL <> '') ? $dayNameURL : $date->current ?>/"class=day-plate-header><?= Yii::t('app', 'What day of the week is {date}', [
                        'date' => ($dayNameURL <> '') ? Yii::t('app', $dayNameURL) : Yii::$app->formatter->asDate($date->current, 'medium')
                    ]) ?></a><br><br><?= $calendarNameOfDaysInWeek['large'][$date->week->dayNumber] ?></div></div><div class="col-xs-12 col-sm-6 day-plates"><div class=day-plate><a href="/<?= Yii::$app->language ?>/calendar/zodiac/days/<?= ($dayNameURL <> '') ? $dayNameURL : $date->current ?>/"class=day-plate-header><?= ($dayNameURL <> '')
                        ? Yii::t('app', 'What is the zodiac sign {day-name}', [
                            'day-name' => Yii::t('app', $dayNameURL)
                        ])
                        : Yii::t('app', 'What is the zodiac sign for {date}', [
                            'date' => Yii::$app->formatter->asDate($date->current, 'medium')
                        ]) ?></a><br><br><a href="/<?= Yii::$app->language ?>/zodiac/<?= $zodiacs->urls->ids[$zodiacs->zodiac->id] ?>/"><?= $zodiacs->zodiac->nameCapital ?></a></div></div><div class="col-xs-12 col-sm-6 day-plates"><div class=day-plate><a href="/<?= Yii::$app->language ?>/calendar/moon/days/<?= ($dayNameURL <> '') ? $dayNameURL : $date->current ?>/"class=day-plate-header><?= ($dayNameURL <> '')
                        ? Yii::t('app', 'What lunar day {day-name}', [
                            'day-name' => Yii::t('app', $dayNameURL)
                        ])
                        : Yii::t('app', 'What lunar day on {date}', [
                            'date' => Yii::$app->formatter->asDate($date->current, 'medium')
                        ]) ?></a><br><br><?= Yii::t('app', '{lunar-day} lunar day', [
                    'lunar-day' => $calendarByMoonMonth['moonDay'][$date->current]
                ]) ?></div></div><div class="col-xs-12 col-sm-6 day-plates"><div class=day-plate><a href="/<?= Yii::$app->language ?>/calendar/moon/phases/days/<?= ($dayNameURL <> '') ? $dayNameURL : $date->current ?>/"class=day-plate-header><?= ($dayNameURL <> '')
                        ? Yii::t('app', 'What is the phase of the moon {day-name}', [
                            'day-name' => Yii::t('app', $dayNameURL)
                        ])
                        : Yii::t('app', 'What is the phase of the moon on {date}', [
                            'date' => Yii::$app->formatter->asDate($date->current, 'medium')
                        ]) ?></a><br><br><?php
                $phase = $calendarByMoonMonth['moonCalendar'][$date->current]['moonPhase']['phase'];
                if ($phase >= 0.00 && $phase < 0.02) {
                    $phaseOutput = Yii::t('app', 'New moon');
                    $phaseURL = 'new-moon';
                }
                if ($phase >= 0.02 && $phase < 0.16) {
                    $phaseOutput = Yii::t('app', 'Waxing crescent');
                    $phaseURL = 'waxing-moon';
                }
                if ($phase >= 0.16 && $phase < 0.25) {
                    $phaseOutput = Yii::t('app', 'Waxing crescent');
                    $phaseURL = 'waxing-moon';
                }

                if ($phase >= 0.25 && $phase < 0.32) {
                    $phaseOutput = Yii::t('app', 'Moon first quarter');
                    $phaseURL = 'waxing-moon';
                }
                if ($phase >= 0.32 && $phase < 0.40) {
                    $phaseOutput = Yii::t('app', 'Growing moon');
                    $phaseURL = 'waxing-moon';
                }
                if ($phase >= 0.40 && $phase < 0.48) {
                    $phaseOutput = Yii::t('app', 'Growing moon');
                    $phaseURL = 'waxing-moon';
                }

                if ($phase >= 0.48 && $phase < 0.52) {
                    $phaseOutput = Yii::t('app', 'Full moon');
                    $phaseURL = 'full-moon';
                }
                if ($phase >= 0.52 && $phase < 0.68) {
                    $phaseOutput = Yii::t('app', 'Waning moon');
                    $phaseURL = 'waning-moon';
                }
                if ($phase >= 0.68 && $phase < 0.73) {
                    $phaseOutput = Yii::t('app', 'Waning moon');
                    $phaseURL = 'waning-moon';
                }

                if ($phase >= 0.73 && $phase < 0.83) {
                    $phaseOutput = Yii::t('app', 'Moon third quarter');
                    $phaseURL = 'waning-moon';
                }
                if ($phase >= 0.83 && $phase < 0.98) {
                    $phaseOutput = Yii::t('app', 'Waning crescent');
                    $phaseURL = 'waning-moon';
                }

                if ($phase >= 0.98 && $phase < 1) {
                    $phaseOutput = Yii::t('app', 'New moon');
                    $phaseURL = 'new-moon';
                }
                ?><a href="/<?= Yii::$app->language ?>/calendar/moon/phases/years/<?= $date->year->current ?>/<?= $phaseURL ?>/"><?= $phaseOutput ?></a></div></div></div><div class="col-xs-12 col-sm-6"><div class="col-xs-12 day-plates"><?php /***************************** */ ?><?php /***************************** Календарь на месяц с отмеченным текущим днем*/ ?><?php /***************************** */ ?><div class=day-plate><a href="/<?= Yii::$app->language ?>/calendar/months/<?= $date->year->current ?>-<?= $date->month->current ?>/"class=day-plate-header><?= $calendarNameOfMonths[$date->month->simple]; ?></a><div class=c-links-block><div class="col-xs-12 c-links-mp-months"><div class="row rflex year"><?php
                            $countMonths = $date->month->simple - 1;
                            $countWeeks = 0;
                            foreach ($calendarByMonth as $months) :?><?php $countMonths++; ?><div class="col-xxs-12 col-xs-6 col-md-3 col-sm-4 day-month"><div class=week-name><?php for ($i = 1; $i <= 7; $i++): ?><div class=day-name><?= $calendarNameOfDaysInWeek[$i]; ?></div><?php endfor; ?></div><?php foreach ($months as $week): ?><div class=week><?php for ($i = 1; $i <= 5; $i++): ?><?php if (isset($week[$i]['monthDay'])): ?><div class="day<?= ($week[$i]['date'] == $date->current) ? ' mday-current' : '' ?>"><span><?= $week[$i]['monthDay']; ?></span></div><?php else: ?><div class=no-day><span></span></div><?php endif; ?><?php endfor; ?><?php for ($i = 6; $i <= 7; $i++): ?><?php if (isset($week[$i]['monthDay'])): ?><div class="day-off<?= ($week[$i]['date'] == $date->current) ? ' mday-current' : '' ?>"><span><?= $week[$i]['monthDay']; ?></span></div><?php else: ?><div class=no-day><span></span></div><?php endif; ?><?php endfor; ?></div><?php endforeach; ?></div><?php endforeach; ?></div></div></div></div></div></div></div><br><hr><br><br><div class="row rflex"><div class="col-xs-12 col-xxs-12"><?php if ($holidaysData): ?><a href="/<?= Yii::$app->language ?>/holidays/days/<?= ($dayNameURL <> '') ? $dayNameURL : $date->current ?>/"class=main-header-a><?= ($dayNameURL <> '')
                    ? Yii::t('app', 'What are the holidays {day-name}', [
                        'day-name' => Yii::t('app', $dayNameURL)
                    ])
                    : Yii::t('app', 'What are the holidays on {date}', [
                        'date' => Yii::$app->formatter->asDate($date->current, 'medium')
                    ]) ?></a><br><br><div class=h-table><div class=h-table-line><div class=h-table-title-first><?= Yii::t('app', 'Date') ?></div><div class=h-table-title><?= Yii::t('app', 'Title') ?></div><div class=h-table-title><?= Yii::t('app', 'Type') ?></div><div class=h-table-title><?= Yii::t('app', 'Country') ?></div></div><?php foreach ($holidaysData as $holiday) : ?><?php $dateFormat = new \DateTime($holiday['date']) ?><div class=h-table-line><div class=h-table-td-first><?= Yii::$app->formatter->asDate($holiday['date'], 'medium'); ?></div><div class=h-table-td><a href="/<?= Yii::$app->language ?>/holidays/<?= $holiday['holidayUrl'] ?>/"><?= $holiday['holidayName'] ?></a></div><div class=h-table-td><?= $holiday['holidayTypeName'] ?></div><div class=h-table-td><a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/<?= $holiday['countryUrl'] ?>/"><?= $holiday['countryName'] ?></a></div></div><?php endforeach; ?></div><?php endif; ?></div></div>