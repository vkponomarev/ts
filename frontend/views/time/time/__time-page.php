<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 */

?>
<script type="text/javascript">

</script>

<a name="time"></a>
<h1 class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>
<?php if ($time->geoIP->active) : ?>
    <div class="row">
        <div class="col-xs-12 plate-digital-watch">
            <span id="timeOne" class="time-block"><?= $time->geoIP->city->date->format('H:i:s') ?></span>
        </div>
        <script type="text/javascript">
            setInterval(
                function () {
                    let timeZone = '<?=$time->geoIP->city->timezone?>';
                    let momentGeoIp = new moment();
                    let hh = momentGeoIp.tz(timeZone).format('H');
                    let mm = momentGeoIp.tz(timeZone).format('mm');
                    let ss = momentGeoIp.tz(timeZone).format('ss');
                    hh = (hh < 10) ? '0' + hh : hh;
                    document.getElementById('timeOne').innerHTML = hh + ':' + mm + ':' + ss;
                }
                , 1000);
        </script>

    </div>
    <div class="row">
        <div class="col-xs-12 plate-digital-watch-text">
            <a href="/<?= Yii::$app->language ?>/time/cities/<?= $time->geoIP->city->url ?>/">
                <?= $time->geoIP->city->name ?>
            </a>
            <?= ', ' ?>
            <?= $date->day->name . ', ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/">
                <?= Yii::$app->formatter->asDate($time->geoIP->city->date, 'long') ?>
            </a>
            <?= ', ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/<?= $date->week->current ?>/">
                <?= Yii::t('app', '{week} week', ['week' => $date->week->current]) ?>
            </a>
            <?= ', ' ?>
            <a href="/<?= Yii::$app->language ?>/time/timezones/utc-317/<?= $time->geoIP->city->offsetSimple ?>/">
                UTC <?= ' ' . $time->geoIP->city->offset ?>
            </a>
        </div>
    </div>
    <br><br>
<?php endif; ?>


<div class="row rflex">
    <?php foreach ($time->location->cities->byPopulation as $key => $city): ?>
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
