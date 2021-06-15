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

<?= $this->render('../time-partials/_geoIP-row.min.php', [
    'time' => $time,
    'date' => $date
]);
?>
<div class="row rflex">
    <?php foreach ($time->location->cities->byPopulation as $key => $city): ?>
        <div class="col-xxs-12 col-xs-6 col-sm-4 col-md-3 plates">
            <div class="plate-clock-min">
                <div class="plate-clock-min-city-name">
                    <a href="/<?= Yii::$app->language ?>/time/cities/<?= $city['url'] ?>/">
                        <?= $city['name'] ?>
                    </a>
                </div>
                <div class="plate-clock-min-digital-watch">
                    <span id="timeSecond<?= $key ?>"><?= $city['date']->format('H:i:s') ?></span>
                </div>

                <script type="text/javascript">
                    setInterval(
                        function () {
                            let moments = new moment();
                            let h = moments.tz('<?= $city['timezone'] ?>').format('H');
                            let m = moments.tz('<?= $city['timezone'] ?>').format('mm');
                            let s = moments.tz('<?= $city['timezone'] ?>').format('ss');
                            h = (h < 10) ? '0' + h : h;
                            document.getElementById('timeSecond' + '<?= $key ?>').innerHTML = h + ':' + m + ':' + s;
                        }
                        , 1000);
                </script>

            </div>
        </div>


    <?php endforeach ?>


</div>
<hr>
<div class="row rflex">
    <?php foreach ($time->location->continents as $key => $continent): ?>
        <div class="col-xxs-12 col-xs-6 col-sm-4 col-md-3 plates">
            <div class="plate-clock-min">
                <div class="plate-clock-min-city-name">
                    <a href="/<?= Yii::$app->language ?>/time/continents/<?= $continent['url'] ?>/">
                        <?= $continent['name'] ?>
                    </a>
                </div>

            </div>
        </div>
    <?php endforeach ?>
</div>
<hr>
<div class="row rflex">
    <div class="col-xxs-12 plates">
        <div class="plate-long">
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/time/countries/">
                <?= Yii::t('app', 'Time in countries') ?>
            </a>
            <?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/time/cities/">
                <?= Yii::t('app', 'Time in cities') ?>
            </a>
            <?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/time/capitals/">
                <?= Yii::t('app', 'Time in capitals') ?>
            </a>
            <?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/time/timezones/">
                <?= Yii::t('app', 'Time Zones') ?>
            </a>

        </div>
    </div>
</div>
<hr>

