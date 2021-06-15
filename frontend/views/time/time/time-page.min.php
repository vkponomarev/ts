<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 */

?><script></script><a name=time></a><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><hr><?php if ($time->geoIP->active) : ?><?= $this->render('../time-partials/_geoIP-row.min.php', [
        'time' => $time,
        'date' => $date
    ]);
    ?><?php else: ?><?= $this->render('../time-partials/_UTC-row.min.php', [
        'time' => $time,
        'date' => $date
    ]);
    ?><?php endif; ?><div class="rflex row"><?php foreach ($time->location->citiesByPopulation->byPopulation as $key => $city): ?><div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates"><div class=plate-clock-min><div class=plate-clock-min-city-name><a href="/<?= Yii::$app->language ?>/time/cities/<?= $city['url'] ?>/"><?= $city['name'] ?></a></div><div class=plate-clock-min-digital-watch><span id="timeSecond<?= $key ?>"><?= $city['date']->format('H:i:s') ?></span></div><script>setInterval(
                        function () {
                            let moments = new moment();
                            let h = moments.tz('<?= $city['timezone'] ?>').format('H');
                            let m = moments.tz('<?= $city['timezone'] ?>').format('mm');
                            let s = moments.tz('<?= $city['timezone'] ?>').format('ss');
                            h = (h < 10) ? '0' + h : h;
                            document.getElementById('timeSecond' + '<?= $key ?>').innerHTML = h + ':' + m + ':' + s;
                        }
                        , 1000);</script></div></div><?php endforeach ?></div><hr><div class="rflex row"><?php foreach ($time->location->continents as $key => $continent): ?><div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates"><div class=plate-clock-min><div class=plate-clock-min-city-name><a href="/<?= Yii::$app->language ?>/time/continents/<?= $continent['url'] ?>/"><?= $continent['name'] ?></a></div></div></div><?php endforeach ?></div><hr><div class="rflex row"><div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates"><div class=plate-clock-min><div class=plate-clock-min-city-name><a href="/<?= Yii::$app->language ?>/time/countries/"class=plate-a-margin><?= Yii::t('app', 'Time in countries') ?></a></div></div></div><div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates"><div class=plate-clock-min><div class=plate-clock-min-city-name><a href="/<?= Yii::$app->language ?>/time/cities/"class=plate-a-margin><?= Yii::t('app', 'Time in cities') ?></a></div></div></div><div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates"><div class=plate-clock-min><div class=plate-clock-min-city-name><a href="/<?= Yii::$app->language ?>/time/capitals/"class=plate-a-margin><?= Yii::t('app', 'Time in capitals') ?></a></div></div></div><div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates"><div class=plate-clock-min><div class=plate-clock-min-city-name><a href="/<?= Yii::$app->language ?>/time/timezones/"class=plate-a-margin><?= Yii::t('app', 'Time Zones') ?></a></div></div></div></div><hr>