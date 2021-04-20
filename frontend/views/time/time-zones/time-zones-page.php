<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 */

?>
<script type="text/javascript">

</script>

<a name="time"></a>
<h1 class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>


<div class="row rflex">
    <div class="col-xs-12">
        <table class="table-time">
            <thead>
            <tr>
                <td>
                    <?= Yii::t('app', 'Abbreviation') ?>
                </td>
                <td>
                    <?= Yii::t('app', 'Name') ?>
                </td>
                <td>
                    <?= Yii::t('app', 'Difference') ?>
                </td>
                <td>
                    <?= Yii::t('app', 'Time') ?>
                </td>
            </tr>
            </thead>
            <?php foreach ($time->timeZones->array as $key => $timeZone): ?>
                <tr>
                    <td>

                            <a href="/<?= Yii::$app->language ?>/time/timezones/<?= $timeZone['url'] ?>/">
                                <?= $timeZone['abbreviation'] ?>
                            </a>

                    </td>
                    <td>
                            <a href="/<?= Yii::$app->language ?>/time/timezones/<?= $timeZone['url'] ?>/">
                                <?= $timeZone['name'] ?>
                            </a>
                    </td>
                    <td>
                        <?php  $timeZone['offset'] = $timeZone['offset'] / 60 / 60;?>
                        <?php echo 'UTC ';
                        echo ($timeZone['offset'] >= 0) ?
                            '+'
                            :
                            ''
                             ?>
                        <?= (is_float($timeZone['offset'])) ?
                            number_format(($timeZone['offset']), 2, '.', '')
                            :
                            $timeZone['offset']
                            ; ?>
                    </td>
                    <td>
                        время
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<br><br>
