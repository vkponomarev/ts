<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 */

?>
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
<?php if ($time->location->cities->byCountry->data) : ?>

<div class="row rflex">
    <?php foreach ($time->location->cities->byCountry->data as $key => $city): ?>

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
<?php endif; ?>