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

<div class="row rflex">
    <div class="col-xxs-12 col-xs-12 col-md-4">
        <div class="row">
            <div class="col-xs-12 plate-digital-watch-diff-left">
                <span id="timeOne" class="time-block"><?= $time->location->city->date->format('H:i:s') ?></span>
            </div>
            <script type="text/javascript">
                setInterval(
                    function () {
                        let timeZone = '<?=$time->location->city->timezone?>';
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
            <div class="col-xs-12 plate-digital-watch-text-diff-left">
                <a href="/<?= Yii::$app->language ?>/time/countries/<?= $time->location->country->url ?>/">
                    <?= $time->location->country->name ?>
                </a>
                <?= ', ' ?>
                <a href="/<?= Yii::$app->language ?>/time/cities/<?= $time->location->city->url ?>/">
                    <?= $time->location->city->name ?>
                </a>
                <?= ', ' ?>
                <?= $date->day->name . ', ' ?>
                <a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/">

                    <?= Yii::$app->formatter->asDate($time->location->city->date->format('Y-m-d H:i:s'), 'long') ?>
                </a>
                <?= ', ' ?>
                <a href="/<?= Yii::$app->language ?>/time/timezones/abbr/utc-317/<?= $time->location->city->offsetSimple ?>/">
                    UTC <?= ' ' . $time->location->city->offset ?>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xxs-12 col-xs-12 col-md-4">
        <div class="plate-digital-watch-diff-hours">
                <?php if ($time->difference->hours->hours > 0) : ?>
                    +
                <?php else: ?>

                <?php endif; ?>
                <?= $time->difference->hours->hours ?>
        </div>
        <div class="difference-cities-city-change">
            <a
               href="/<?= Yii::$app->language ?>/time/difference/cities/<?= $time->difference->location->city->url ?>/<?= $time->location->city->url ?>/">
                <img src="/files/exchange.png" alt="Change" width="30px">
            </a>
        </div>
    </div>
    <?php if ($time->difference->hours->name == 'location') : ?>
        <?= $this->render('../time-partials/_time-difference-location-right.min.php', [
            'time' => $time->difference,
            'date' => $date
        ]);
        ?>
    <?php endif; ?>
    <?php if ($time->difference->hours->name == 'geoIP') : ?>
        <?= $this->render('../time-partials/_time-difference-geoIP-right.min.php', [
            'time' => $time,
            'date' => $date
        ]);
        ?>
    <?php endif; ?>
    <?php if ($time->difference->hours->name == 'UTC') : ?>
        <?= $this->render('../time-partials/_time-difference-UTC-right.min.php', [
            'time' => $time,
            'date' => $date
        ]);
        ?>
    <?php endif; ?>
</div>

<hr>
<div class="row rflex">
    <div class="col-xs-12 col-xs-6 difference-cities-city-prev">
        <a href="/<?= Yii::$app->language ?>/time/difference/cities/<?= $time->location->city->url ?>/<?= $time->difference->prevNext->previous['url'] ?>/">
            <?= $time->difference->prevNext->previous['name'] ?>
        </a>
    </div>
    <div class="col-xs-12 col-xs-6 difference-cities-city-next">
        <a href="/<?= Yii::$app->language ?>/time/difference/cities/<?= $time->location->city->url ?>/<?= $time->difference->prevNext->next['url'] ?>/">
            <?= $time->difference->prevNext->next['name'] ?>
        </a>
    </div>
</div>
<hr>
<div class="row rflex">
    <?php foreach (array_reverse($time->difference->hoursArray->array) as $one): ?>
        <?php if (isset($time->difference->cities->sorted[$one])) : ?>
            <?php foreach ($time->difference->cities->sorted[$one] as $city): ?>
                <?php if ($city['differenceHours'] >= 0) : ?>
                    <div class="col-xxs-12 col-xs-6 difference-cities-city-name-plus">
                        <a href="/<?= Yii::$app->language ?>/time/difference/cities/<?= $time->location->city->url ?>/<?= $city['url'] ?>/">
                            <?= $city['name'] ?>

                        </a>
                    </div>
                    <div class="col-xxs-12 col-xs-6 difference-cities-city-hours-plus">
                        <?php foreach (range(0, ceil($city['differenceHours'])) as $valueTwo): ?>
                            <?php if ($valueTwo == 0) : ?>


                            <?php else: ?>
                                <div class="difference-cities-hours-color">
                                </div>
                            <?php endif; ?>

                        <?php endforeach ?> &nbsp;
                        <?= '+' . $city['differenceHours'] ?>

                    </div>
                <?php else: ?>

                    <div class="col-xxs-12 col-xs-6 difference-cities-city-hours-minus">
                        <?= $city['differenceHours'] ?> &nbsp;
                        <?php foreach (range(0, ceil($city['differenceHours'])) as $valueTwo): ?>
                            <?php if ($valueTwo == 0) : ?>

                            <?php else: ?>
                                <div class="difference-cities-hours-color">

                                </div>
                            <?php endif; ?>
                        <?php endforeach ?>

                    </div>
                    <div class="col-xxs-12 col-xs-6 difference-cities-city-name-minus">
                        <a href="/<?= Yii::$app->language ?>/time/difference/cities/<?= $time->location->city->url ?>/<?= $city['url'] ?>/">
                            <?= $city['name'] ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach ?>
        <?php endif; ?>
    <?php endforeach ?>
</div>