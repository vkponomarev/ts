<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 * @var $namaz \common\componentsV2\namaz\Namaz
 */

?>
<script type="text/javascript">

</script>



<a name="time"></a>
<h1 class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<?= $this->render('../namaz-partials/_namaz-row.min.php', [
    'time' => $time,
    'date' => $date,
    'namaz' => $namaz,
]);
?>


<div class="row rflex">
    <div class="col-xxs-12 plates">
        <div class="plate-long">
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/"><?= Yii::t('app', 'Namaz') ?></a><?= ' / ' ?>

            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/"><?= $time->location->city->name ?></a><?= ' / ' ?>

            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/morning/"><?= Yii::t('app', 'Morning') ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/evening/"><?= Yii::t('app', 'Evening') ?></a><?= ' / ' ?>

            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/years/<?= $date->year->current ?>/"><?= Yii::t('app', 'Year') ?></a><?= ' / ' ?>

            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-01/"><?= $calendarNameOfMonths[1] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-02/"><?= $calendarNameOfMonths[2] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-03/"><?= $calendarNameOfMonths[3] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-04/"><?= $calendarNameOfMonths[4] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-05/"><?= $calendarNameOfMonths[5] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-06/"><?= $calendarNameOfMonths[6] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-07/"><?= $calendarNameOfMonths[7] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-08/"><?= $calendarNameOfMonths[8] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-09/"><?= $calendarNameOfMonths[9] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-10/"><?= $calendarNameOfMonths[10] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-11/"><?= $calendarNameOfMonths[11] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-12/"><?= $calendarNameOfMonths[12] ?></a>
        </div>
    </div>
</div>

<hr>
<div class="row rflex">
    <div class="col-xs-12 col-xs-6 difference-cities-city-prev">
        <a href="/<?= Yii::$app->language ?>/namaz/cities/<?= $namaz->cityPrevNext->previous['url'] ?>/">
            <?= $namaz->cityPrevNext->previous['name'] ?>
        </a>
    </div>
    <div class="col-xs-12 col-xs-6 difference-cities-city-next">
        <a href="/<?= Yii::$app->language ?>/namaz/cities/<?= $namaz->cityPrevNext->next['url'] ?>/">
            <?= $namaz->cityPrevNext->next['name'] ?>
        </a>
    </div>
</div>
<hr>

<div class="row rflex">
    <?php foreach ($time->location->cities->byCountry->data as $key => $city): ?>

        <div class="col-xxs-12 col-xs-6 col-sm-4 col-md-3 plates">
            <div class="plate-clock-min">
                <div class="plate-clock-min-city-name">
                    <a href="/<?= Yii::$app->language ?>/namaz/cities/<?= $city['url'] ?>/">
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
    <?php foreach ($time->location->citiesByPopulation->byPopulation as $key => $city): ?>
        <div class="col-xxs-12 col-xs-6 col-sm-4 col-md-3 plates">
            <div class="plate-clock-min">
                <div class="plate-clock-min-city-name">
                    <a href="/<?= Yii::$app->language ?>/namaz/cities/<?= $city['url'] ?>/">
                        <?= $city['name'] ?>
                    </a>
                </div>
                <div class="plate-clock-min-digital-watch">
                    <span id="timeThird<?= $key ?>"><?= $city['date']->format('H:i:s') ?></span>
                </div>

                <script type="text/javascript">
                    setInterval(
                        function () {
                            let moments = new moment();
                            let h = moments.tz('<?= $city['timezone'] ?>').format('H');
                            let m = moments.tz('<?= $city['timezone'] ?>').format('mm');
                            let s = moments.tz('<?= $city['timezone'] ?>').format('ss');
                            h = (h < 10) ? '0' + h : h;
                            document.getElementById('timeThird' + '<?= $key ?>').innerHTML = h + ':' + m + ':' + s;
                        }
                        , 1000);
                </script>

            </div>
        </div>
    <?php endforeach ?>
</div>