<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 * @var $namaz \common\componentsV2\namaz\Namaz
 */
/*
 *
 * +[Fajr] => 02:59
   +[Sunrise] => 04:39
   +[Dhuhr] => 13:18
   +[Asr] => 17:48
   [Sunset] => 21:58
   +[Maghrib] => 21:58
   +[Isha] => 23:38
   [Imsak] => 02:49
   [Midnight] => 01:18
 */
?><div class=row><div class="col-lg-2 col-xs-4 col-xxs-12 plate-namaz-times"><div class=plate-namaz-times-item-time><?= $namaz->geoIP->times['Fajr'] ?></div><div class=plate-namaz-times-item><?= Yii::t('app', 'Fajr') ?></div></div><div class="col-lg-2 col-xs-4 col-xxs-12 plate-namaz-times"><div class=plate-namaz-times-item-time><?= $namaz->geoIP->times['Sunrise'] ?></div><div class=plate-namaz-times-item><?= Yii::t('app', 'Sunrise') ?></div></div><div class="col-lg-2 col-xs-4 col-xxs-12 plate-namaz-times"><div class=plate-namaz-times-item-time><?= $namaz->geoIP->times['Dhuhr'] ?></div><div class=plate-namaz-times-item><?= Yii::t('app', 'Dhuhr') ?></div></div><div class="col-lg-2 col-xs-4 col-xxs-12 plate-namaz-times"><div class=plate-namaz-times-item-time><?= $namaz->geoIP->times['Asr'] ?></div><div class=plate-namaz-times-item><?= Yii::t('app', 'Asr') ?></div></div><div class="col-lg-2 col-xs-4 col-xxs-12 plate-namaz-times"><div class=plate-namaz-times-item-time><?= $namaz->geoIP->times['Maghrib'] ?></div><div class=plate-namaz-times-item><?= Yii::t('app', 'Maghrib') ?></div></div><div class="col-lg-2 col-xs-4 col-xxs-12 plate-namaz-times"><div class=plate-namaz-times-item-time><?= $namaz->geoIP->times['Isha'] ?></div><div class=plate-namaz-times-item><?= Yii::t('app', 'Isha') ?></div></div></div><br><br><div class=row><div class="col-xs-12 plate-namaz-times-text"><div class=plate-namaz-digital-watch><a href="/<?= Yii::$app->language ?>/time/cities/<?= $time->geoIP->city->url ?>/"><span class=time-block id=timeOne><?= $time->geoIP->city->date->format('H:i:s') ?></span></a><?=  ', ' ?></div><script>setInterval(
                function () {
                    let timeZone = '<?=$time->geoIP->city->timezone?>';
                    let momentGeoIp = new moment();
                    let hh = momentGeoIp.tz(timeZone).format('H');
                    //console.log(momentGeoIp.tz(timeZone));
                    let mm = momentGeoIp.tz(timeZone).format('mm');
                    let ss = momentGeoIp.tz(timeZone).format('ss');
                    hh = (hh < 10) ? '0' + hh : hh;
                    document.getElementById('timeOne').innerHTML = hh + ':' + mm + ':' + ss;
                }
                , 1000);</script>&nbsp; <a href="/<?= Yii::$app->language ?>/time/countries/<?= $time->geoIP->country->url ?>/"><?= $time->geoIP->country->name ?></a><?= ', ' ?><a href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->geoIP->city->url ?>/"><?= $time->geoIP->city->name ?></a><?= ', ' ?><?= $date->day->name . ', ' ?><a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/"><?= Yii::$app->formatter->asDate($time->geoIP->city->date->format('Y-m-d H:i:s'), 'long') ?></a><?= ', ' ?><a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/<?= $date->week->current ?>/"><?= Yii::t('app', '{week} week', ['week' => $date->week->current]) ?></a><?= ', ' ?><a href="/<?= Yii::$app->language ?>/time/timezones/abbr/utc-317/<?= $time->geoIP->city->offsetSimple ?>/">UTC<?= ' ' . $time->geoIP->city->offset ?></a></div></div><br><hr>