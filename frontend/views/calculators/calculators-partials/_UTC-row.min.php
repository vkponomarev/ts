<??><div class=row><div class="col-xs-12 plate-digital-watch"><span class=time-block id=timeOne><?= $time->UTC->format('H:i:s') ?></span></div><script>setInterval(
            function () {
                let timeZone = 'UTC';
                let momentGeoIp = new moment();
                let hh = momentGeoIp.utc().format('H');
                let mm = momentGeoIp.utc().format('mm');
                let ss = momentGeoIp.utc().format('ss');
                hh = (hh < 10) ? '0' + hh : hh;
                document.getElementById('timeOne').innerHTML = hh + ':' + mm + ':' + ss;
            }
            , 1000);</script></div><div class=row><div class="col-xs-12 plate-digital-watch-text"><a href="/<?= Yii::$app->language ?>/time/timezones/abbr/utc-317/"><?= 'UTC' ?></a><?= ', ' ?><?= $date->day->name . ', ' ?><a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/"><?= Yii::$app->formatter->asDate($time->UTC->format('Y-m-d H:i:s'), 'long') ?></a></div></div><br><hr>