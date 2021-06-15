<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 */

?><a name=timzones></a><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><hr><?php if ($time->geoIP->active) : ?><?= $this->render('../time-partials/_geoIP-row.min.php', [
        'time' => $time,
        'date' => $date
    ]);
    ?><?php else: ?><?= $this->render('../time-partials/_UTC-row.min.php', [
        'time' => $time,
        'date' => $date
    ]);
    ?><?php endif; ?><div class="rflex row"><div class=col-xs-12><table class=table-time><thead><tr><td><?= Yii::t('app', 'Abbreviation') ?><td><?= Yii::t('app', 'Name') ?><td><?= Yii::t('app', 'Difference') ?><td><?= Yii::t('app', 'Time') ?></thead><?php foreach ($time->timezone->abbreviations as $key => $timeZone): ?><tr><td><a href="/<?= Yii::$app->language ?>/time/timezones/abbr/<?= $timeZone['url'] ?>/"><?= $timeZone['abbreviation'] ?></a><td><a href="/<?= Yii::$app->language ?>/time/timezones/abbr/<?= $timeZone['url'] ?>/"><?= $timeZone['name'] ?></a><td><?php $timeZone['offset'] = $timeZone['offset'] / 60 / 60; ?><?= 'UTC ' ?><?= $timeZone['offset_hours'] ?><td></tr><?php endforeach ?></table></div></div><br><br><a name=timzones-iana></a><h2 class=main-page-h2><?= Yii::$app->params['text']['h1'] ?><?= ' IANA' ?></h2><hr><div class="rflex row"><div class=col-xs-12><table class=table-time><thead><tr><td><?= Yii::t('app', 'Name') ?><td><?= Yii::t('app', 'Difference') ?><td><?= Yii::t('app', 'Time') ?></thead><?php foreach ($time->timezone->ianas as $key2 => $timezone2): ?><tr><td><a href="/<?= Yii::$app->language ?>/time/timezones/iana/<?= $timezone2['url'] ?>/"><?= $timezone2['zone_name'] ?></a><td><?php
                        $timeTest = (
                        new \DateTime())->setTimeZone(
                                new \DateTimeZone($timezone2['zone_name']));
                        ?><?= 'UTC ' ?><?= $timeTest->format('O'); ?><td></tr><?php endforeach ?></table></div></div><br><br>