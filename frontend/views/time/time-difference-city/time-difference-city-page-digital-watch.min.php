<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 */

?><script></script><a name=time></a><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><hr><div class="row rflex"><div class="col-xs-12 col-md-4 col-sm-4 col-xxs-12 plates"><div class=plate-clock><div class=plate-clock-analog-watch><div id=container><div id=content><canvas height=200 id=1111 width=200><script>$(function () {
                                let<?= 'clock' . '1111' ?>=
                                new Clock(<?= '1111' ?>,
                                    '<?= $time->location->city->timezone ?>',
                                    '<?= 'date' . '1111' ?>',
                                    '<?= Yii::$app->language; ?>'
                                );
                            });</script></canvas></div></div></div><div class=plate-clock-digital-watch><span id="time<?= '1111' ?>">12:30:35</span></div><script>setInterval(
                function () {
                    let moments = new moment();
                    let h = moments.tz('<?= $time->location->city->timezone ?>').format('H');
                    let m = moments.tz('<?= $time->location->city->timezone ?>').format('mm');
                    let s = moments.tz('<?= $time->location->city->timezone ?>').format('ss');
                    h = (h < 10) ? '0' + h : h;
                    document.getElementById('time' + '<?= '1111' ?>').innerHTML = h + ':' + m + ':' + s;
                }
                , 1000);</script><div class=plate-clock-city-name><a href=/ ><?= $time->location->city->name ?></a></div><div class=plate-clock-date><?= Yii::$app->formatter->asDate($time->location->city->date, 'long') ?></div><div class=plate-clock-utc><span id="date<?= '1111' ?>"></span></div></div></div><div class="col-xs-12 col-md-4 col-sm-4 col-xxs-12 plates"></div><div class="col-xs-12 col-md-4 col-sm-4 col-xxs-12 plates"><div class=plate-clock><div class=plate-clock-analog-watch><div id=container><div id=content><canvas height=200 id=2222 width=200><script>$(function () {
                                    let<?= 'clock' . '2222' ?>=
                                    new Clock(<?= '2222' ?>,
                                        '<?= $time->location->city->timezone ?>',
                                        '<?= 'date' . '2222' ?>',
                                        '<?= Yii::$app->language; ?>'
                                    );
                                });</script></canvas></div></div></div><div class=plate-clock-digital-watch><span id="time<?= '2222' ?>">12:30:35</span></div><script>setInterval(
                    function () {
                        let moments = new moment();
                        let h = moments.tz('<?= $time->location->city->timezone ?>').format('H');
                        let m = moments.tz('<?= $time->location->city->timezone ?>').format('mm');
                        let s = moments.tz('<?= $time->location->city->timezone ?>').format('ss');
                        h = (h < 10) ? '0' + h : h;
                        document.getElementById('time' + '<?= '2222' ?>').innerHTML = h + ':' + m + ':' + s;
                    }
                    , 1000);</script><div class=plate-clock-city-name><a href=/ ><?= $time->location->city->name ?></a></div><div class=plate-clock-date><?= Yii::$app->formatter->asDate($time->location->city->date, 'long') ?></div><div class=plate-clock-utc><span id="date<?= '2222' ?>"></span></div></div></div></div><div class=row><div class="col-xs-12 plate-digital-watch"><span id=timeOne class=time-block><?= $time->location->city->date->format('H:i:s') ?></span></div><script>setInterval(
            function () {
                let timeZone = '<?=$time->location->city->timezone?>';
                let momentGeoIp = new moment();
                let hh = momentGeoIp.tz(timeZone).format('H');
                let mm = momentGeoIp.tz(timeZone).format('mm');
                let ss = momentGeoIp.tz(timeZone).format('ss');
                hh = (hh < 10) ? '0' + hh : hh;
                document.getElementById('timeOne').innerHTML = hh + ':' + mm + ':' + ss;
            }
            , 1000);</script></div><div class=row><div class="col-xs-12 plate-digital-watch-text"><a href="/<?= Yii::$app->language ?>/time/countries/<?= $time->location->country->url ?>/"><?= $time->location->country->name ?></a><?= ', ' ?><a href="/<?= Yii::$app->language ?>/time/cities/<?= $time->location->city->url ?>/"><?= $time->location->city->name ?></a><?= ', ' ?><?= $date->day->name . ', ' ?><a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/"><?= Yii::$app->formatter->asDate($time->location->city->date, 'long') ?></a><?= ', ' ?><a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/<?= $date->week->current ?>/"><?= Yii::t('app', '{week} week', ['week' => $date->week->current]) ?></a><?= ', ' ?><a href="/<?= Yii::$app->language ?>/time/timezones/abbr/utc-317/<?= $time->location->city->offsetSimple ?>/">UTC<?= ' ' . $time->location->city->offset ?></a></div></div><br><br><hr>