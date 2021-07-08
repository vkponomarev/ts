<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 */

?>
    <div class="col-xxs-12 col-xs-12 col-md-4">
        <div class="row">
            <div class="col-xs-12 plate-digital-watch-diff-right">
                <span id="timeTwo" class="time-block"><?= $time->location->city->date->format('H:i:s') ?></span>
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
                        document.getElementById('timeTwo').innerHTML = hh + ':' + mm + ':' + ss;
                    }
                    , 1000);
            </script>

        </div>
        <div class="row">
            <div class="col-xs-12 plate-digital-watch-text-diff-right">
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
                    <?php \Yii::$app->timeZone = $time->location->city->timezone; ?>
                    <?= Yii::$app->formatter->asDate($time->location->city->dateReal->format('Y-m-d H:i:s'), 'long') ?>
                </a>
                <?= ', ' ?>
                <a href="/<?= Yii::$app->language ?>/time/timezones/abbr/utc-317/<?= $time->location->city->offsetSimple ?>/">
                    UTC <?= ' ' . $time->location->city->offset ?>
                </a>
            </div>
        </div>
    </div>
