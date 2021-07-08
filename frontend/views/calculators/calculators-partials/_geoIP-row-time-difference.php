<?php if ($time->geoIP->active) : ?>

    <div class="row">
        <div class="col-xs-12 plate-digital-watch-diff-right">
            <span id="timeTwo" class="time-block"><?= $time->geoIP->city->date->format('H:i:s') ?></span>
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
                    document.getElementById('timeTwo').innerHTML = hh + ':' + mm + ':' + ss;
                }
                , 1000);
        </script>

    </div>
    <div class="row">
        <div class="col-xs-12 plate-digital-watch-text-diff-right">
            <a href="/<?= Yii::$app->language ?>/time/countries/<?= $time->geoIP->country->url ?>/">
                <?= $time->geoIP->country->name ?></a><?= ', ' ?>
            <a href="/<?= Yii::$app->language ?>/time/cities/<?= $time->geoIP->city->url ?>/">
                <?= $time->geoIP->city->name ?>
            </a>
            <?= ', ' ?>
            <?= $date->day->name . ', ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/">

                <?php \Yii::$app->timeZone = $time->geoIP->city->timezone; ?>
                <?= Yii::$app->formatter->asDate($time->geoIP->city->date->format('Y-m-d H:i:s'), 'long') ?>
            </a>
            <?= ', ' ?>
            <a href="/<?= Yii::$app->language ?>/time/timezones/abbr/utc-317/<?= $time->geoIP->city->offsetSimple ?>/">
                UTC <?= ' ' . $time->geoIP->city->offset ?>
            </a>
        </div>
    </div>
    <br><br>
<?php endif; ?>