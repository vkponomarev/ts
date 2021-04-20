<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 */

$ip = Yii::$app->geoip->ip('192.168.0.110'); // current user ip



//$ip = Yii::$app->geoip->ip("50.113.83.100");

$ip->city; // "San Francisco"
$ip->country; // "United States"
$ip->location->lng; // 37.7898
$ip->location->lat; // -122.3942
$ip->isoCode; // "US"
(new \common\components\dump\Dump())->printR($ip);die;
$geoip = new \lysenkobv\GeoIP\GeoIP();
$ip = $geoip->ip("208.113.83.165");

$ip->city; // "San Francisco"
$ip->country; // "United States"
$ip->location->lng; // 37.7898
$ip->location->lat; // -122.3942
$ip->isoCode;  // "US"

?>
<script type="text/javascript">

</script>

<a name="time"></a>
<h1 class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<div class="row rflex">

    <?php foreach ($time->citiesByPopulation as $key => $city): ?>

        <div class="col-xxs-12 col-xs-6 col-sm-4 col-md-3 plates">
            <div class="plate-clock">
                <div class="plate-clock-analog-watch">
                    <div id="container">
                        <div id="content">
                            <canvas id="<?= $key ?>" width="200" height="200">
                                <script type="text/javascript">
                                    $(function () {
                                        let <?= 'clock' . $key ?> =
                                        new Clock(
                                            <?= $key ?>,
                                            '<?= $city['timezone'] ?>',
                                            '<?= 'date' . $key ?>',
                                            '<?= Yii::$app->language; ?>'
                                        );
                                    });
                                </script>
                            </canvas>
                        </div>
                    </div>

                </div>
                <div class="plate-clock-digital-watch">
                    <span id="time<?= $key ?>">12:30:35</span>
                </div>

                <script type="text/javascript">
                    setInterval(
                        function () {
                            let moments = new moment();
                            let h = moments.tz('<?= $city['timezone'] ?>').format('H');
                            let m = moments.tz('<?= $city['timezone'] ?>').format('mm');
                            let s = moments.tz('<?= $city['timezone'] ?>').format('ss');
                            h = (h < 10) ? '0' + h : h;
                            document.getElementById('time' + '<?= $key ?>').innerHTML = h + ':' + m + ':' + s;
                        }
                        , 1000);
                </script>
                <div class="plate-clock-city-name">
                    <a href="/">
                        <?= $city['name'] ?>
                    </a>
                </div>
                <div class="plate-clock-date">
                    <?= Yii::$app->formatter->asDate($city['date'], 'long') ?>
                </div>
                <div class="plate-clock-utc">
                    <span id="date<?= $key ?>"></span>
                </div>

            </div>
        </div>


    <?php endforeach ?>
</div>
<br><br>
<a name=timezones></a>
<h2 class=main-page-h2>
    <?= Yii::t('app', 'Time zones') ?>
</h2>
<hr>
