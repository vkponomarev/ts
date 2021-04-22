<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 */

/*
 *<canvas id="canvas" width="200" height="200">
                    <script type="text/javascript">
                        $(function () {
                            let clock =
                                new ClockSecond({
                                    canvasID: 'canvas',
                                    timeZone: '',
                                    dateID: 'date',
                                    language: '<?= Yii::$app->language; ?>', timeZoneUTC:<?= $time->timeZone->current['offset'] / 60 ?>}); });*/ ?> <a name=time></a><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><hr><script>setInterval(
        function () {
            let moments = new moment().utcOffset(<?= $time->timeZone->current['offset'] / 60 ?>);
            let h = moments.format('H');
            let m = moments.format('mm');
            let s = moments.format('ss');
            h = (h < 10) ? '0' + h : h;
            document.getElementById('time').innerHTML = h + ':' + m + ':' + s;
        }
        , 1000);</script><div class=row><div class="col-xs-12 plate-digital-watch"><span id=time class=time-block><?= $time->timeZone->date->format('H:i:s') ?></span></div></div><div class=row><div class="col-xs-12 plate-digital-watch-text"><?= $date->day->name . ', ' ?><a href="/<?= Yii::$app->language ?>/calendar/years/<?= $date->year->current ?>/"><?= Yii::$app->formatter->asDate($time->timeZone->date, 'long') ?></a><?= ', '?><a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/<?= $date->week->current ?>/"><?= Yii::t('app', '{week} week', ['week' => $date->week->current]) ?></a><?= ', '?><a href="/<?= Yii::$app->language ?>/"><span id=date></span></a></div></div><br><br><div class=row><?php /***************************** */ ?><?php /***************************** Сегодняшний год*/ ?><?php /***************************** */ ?><div class="col-xs-6 col-xxs-12 current-date"><div class=current-date-div><div class=current-date-one></div><div class=digital-watch><span id=time>12:30:35</span></div><div class=digital-watch-utc></div><div class=current-date-text><?= Yii::$app->params['text']['text1'] ?></div></div></div><div class="col-xs-6 col-xxs-12 plates"><div class=plate><div class=plate-header><a href="/<?= Yii::$app->language ?>/holidays/<?= $time->timeZone->current['url'] ?>/"><?= $time->timeZone->current['name'] ?></a><?= ' / ' ?></div><div class=plate-links><div class="col-xs-6 c-links-mp-months">yugkgyuk</div><div class="col-xs-6 c-links-mp-months">yukyguk</div></div><div class=plate-links><hr></div><div class=plate-links><div class="col-xs-6 c-links-mp-months">awefae</div><div class="col-xs-6 c-links-mp-months">awefaef</div></div></div></div></div>