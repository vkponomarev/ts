<div class="col-xxs-12 col-xs-12 col-md-4">
    <div class="row">
        <div class="col-xs-12 plate-digital-watch-diff-right">
            <span id="timeTwo" class="time-block"><?= $time->UTC->format('H:i:s') ?></span>
        </div>
        <script type="text/javascript">
            setInterval(
                function () {
                    let timeZone = 'UTC';
                    let momentGeoIp = new moment();
                    let hh = momentGeoIp.utc().format('H');
                    let mm = momentGeoIp.utc().format('mm');
                    let ss = momentGeoIp.utc().format('ss');
                    hh = (hh < 10) ? '0' + hh : hh;
                    document.getElementById('timeTwo').innerHTML = hh + ':' + mm + ':' + ss;
                }
                , 1000);
        </script>

    </div>
    <div class="row">
        <div class="col-xs-12 plate-digital-watch-text-diff-right">
            <a href="/<?= Yii::$app->language ?>/time/timezones/abbr/utc-317/">
                <?= 'UTC' ?>
            </a>
            <?= ', ' ?>
            <?= $date->day->name . ', ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/">
                <?= Yii::$app->formatter->asDate($time->location->city->date->format('Y-m-d H:i:s'), 'long') ?>
            </a>
        </div>
    </div>
</div>
