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
    <?= $this->render('../time-partials/_geoIP-row.min.php', [
        'time' => $time,
        'date' => $date
    ]);
    ?>

<?php else: ?>
    <?= $this->render('../time-partials/_UTC-row.min.php', [
        'time' => $time,
        'date' => $date
    ]);
    ?>
<?php endif; ?>
<div class="row rflex">

    <?php foreach ($time->location->countries->data as $key => $country): ?>
        <div class="col-xxs-12 col-xs-6 col-sm-4 col-md-3 plates">
            <div class="plate-clock-min">
                <div class="plate-clock-min-country-name">
                    <a href="/<?= Yii::$app->language ?>/time/countries/<?= $country['url'] ?>/">
                        <?= $country['name'] ?>
                    </a>
                </div>
                <hr>
                <?php foreach ($country['cities'] as $key2 => $city): ?>
                    <div class="plate-clock-min-city-name">
                        <a href="/<?= Yii::$app->language ?>/time/cities/<?= $city['url'] ?>/">
                            <?= $city['name'] ?>
                        </a>
                    </div>
                    <div class="plate-clock-min-digital-watch">
                        <span id="time<?= $key . $key2 ?>"><?= $city['date']->format('H:i:s') ?></span>
                    </div>

                    <script type="text/javascript">
                        setInterval(
                            function () {
                                let moments = new moment();
                                let h = moments.tz('<?= $city['timezone'] ?>').format('H');
                                let m = moments.tz('<?= $city['timezone'] ?>').format('mm');
                                let s = moments.tz('<?= $city['timezone'] ?>').format('ss');
                                h = (h < 10) ? '0' + h : h;
                                document.getElementById('time' + '<?= $key . $key2 ?>').innerHTML = h + ':' + m + ':' + s;
                            }
                            , 1000);
                    </script>
                <?php endforeach ?>


            </div>
        </div>


    <?php endforeach ?>
</div>
<br><br>
<hr>

