<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 */

?><a name=time></a><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><hr><script>setInterval(
        function () {
            let moments = new moment().utcOffset(<?= $time->timezone->abbreviation->offsetSeconds / 60?>);
            let h = moments.format('H');
            let m = moments.format('mm');
            let s = moments.format('ss');
            h = (h < 10) ? '0' + h : h;
            document.getElementById('time').innerHTML = h + ':' + m + ':' + s;
        }
        , 1000);</script><div class=row><div class="col-xs-12 plate-digital-watch"><span id=time class=time-block><?= $time->timezone->abbreviation->date->format('H:i:s') ?></span></div></div><div class=row><div class="col-xs-12 plate-digital-watch-text"><a href="/<?= Yii::$app->language ?>/time/timezones/abbr/<?= $time->timezone->abbreviation->url ?>/"><?= $time->timezone->abbreviation->name ?></a><?= ', ' ?><?= $date->day->name . ', ' ?><a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/"><?= Yii::$app->formatter->asDate($time->timezone->abbreviation->date->format('Y-m-d H:i:s'), 'long') ?></a><?= ', ' ?><a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/<?= $date->week->current ?>/"><?= Yii::t('app', '{week} week', ['week' => $date->week->current]) ?></a><?= ', ' ?><a href="/<?= Yii::$app->language ?>/time/timezones/abbr/utc-317/<?= $time->timezone->abbreviation->offsetSimple ?>/">UTC<?= ' ' . $time->timezone->abbreviation->offset ?></a></div></div><br><br><hr><?php if (isset($time->timezone->abbreviation->ianas->ianaData)) : ?><br><br><?php foreach ($time->timezone->abbreviation->ianas->ianaData as $key => $iana): ?><?php if (isset($iana['cities'])) : ?><a href="/<?= Yii::$app->language ?>/time/timezones/iana/<?= $iana['url'] ?>"class=main-header-a><?= $iana['timezone_id'] ?></a><hr><div class="row rflex"><?php foreach ($iana['cities'] as $city): ?><div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates"><div class=plate-clock-min><div class=plate-clock-min-city-name><a href="/<?= Yii::$app->language ?>/time/cities/<?= $city['url'] ?>/"><?= $city['name'] ?></a></div><div class=plate-clock-min-digital-watch><span id="timeTimezonesCity<?= $key ?>"><?= $city['date']->format('H:i:s') ?></span></div><script>setInterval(
                                    function () {
                                        let timeZone = '<?=$city['timezone']?>';
                                        let momentGeoIp = new moment();
                                        let hh = momentGeoIp.tz(timeZone).format('H');
                                        let mm = momentGeoIp.tz(timeZone).format('mm');
                                        let ss = momentGeoIp.tz(timeZone).format('ss');
                                        h = (h < 10) ? '0' + h : h;
                                        document.getElementById('timeTimezonesCity' + '<?= $key ?>').innerHTML = h + ':' + m + ':' + s;
                                    }
                                    , 1000);</script></div></div><?php endforeach ?></div><hr><br><br><?php endif; ?><?php endforeach ?><?php endif; ?><div class="row rflex"><?php if ($time->timezone->abbreviation->cities) : ?><?php foreach ($time->timezone->abbreviation->cities as $key => $city): ?><div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates"><div class=plate-clock-min><div class=plate-clock-min-city-name><a href="/<?= Yii::$app->language ?>/time/cities/<?= $city['url'] ?>/"><?= $city['name'] ?></a>, <a href="/<?= Yii::$app->language ?>/time/countries/<?= $city['countryUrl'] ?>/"><?= $city['countryName'] ?></a></div><div class=plate-clock-min-digital-watch><span id="timeSecond<?= $key ?>"><?= $city['date']->format('H:i:s') ?></span></div><script>setInterval(
                            function () {
                                let moments = new moment();
                                let h = moments.tz('<?= $city['timezone'] ?>').format('H');
                                let m = moments.tz('<?= $city['timezone'] ?>').format('mm');
                                let s = moments.tz('<?= $city['timezone'] ?>').format('ss');
                                h = (h < 10) ? '0' + h : h;
                                document.getElementById('timeSecond' + '<?= $key ?>').innerHTML = h + ':' + m + ':' + s;
                            }
                            , 1000);</script></div></div><?php endforeach ?><?php endif; ?></div><div class="row rflex"><?php foreach ($time->location->citiesByPopulation->byPopulation as $key => $city): ?><div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates"><div class=plate-clock-min><div class=plate-clock-min-city-name><a href="/<?= Yii::$app->language ?>/time/cities/<?= $city['url'] ?>/"><?= $city['name'] ?></a></div><div class=plate-clock-min-digital-watch><span id="timeCitiesByPopulation<?= $key ?>"><?= $city['date']->format('H:i:s') ?></span></div><script>setInterval(
                        function () {
                            let moments = new moment();
                            let h = moments.tz('<?= $city['timezone'] ?>').format('H');
                            let m = moments.tz('<?= $city['timezone'] ?>').format('mm');
                            let s = moments.tz('<?= $city['timezone'] ?>').format('ss');
                            h = (h < 10) ? '0' + h : h;
                            document.getElementById('timeCitiesByPopulation' + '<?= $key ?>').innerHTML = h + ':' + m + ':' + s;
                        }
                        , 1000);</script></div></div><?php endforeach ?></div><hr><div class="row rflex"><?php foreach ($time->timezone->abbreviation->timeOffsets as $key => $offset): ?><div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates"><div class=plate-clock-min><div class=plate-clock-min-city-name><a href="/<?= Yii::$app->language ?>/time/timezones/abbr/<?= $time->timezone->abbreviation->url ?>/<?= $offset['url'] ?>/"><?= $offset['url'] ?></a></div></div></div><?php endforeach ?></div><hr>