<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 * @var $calculators \common\componentsV2\calculators\Calculators
 */


?>
<script type="text/javascript">


</script>

<?php if ($time->geoIP->active == 1) : ?>
    <?php $defaultTime = $time->geoIP->city->date; ?>

<?php else: ?>
    <?php $defaultTime = $date->time ?>

<?php endif; ?>
<?php
/*
$defaultTime =
    $defaultTime->format('D') .
    ', ' .
    Yii::$app->formatter->asDate($defaultTime, 'php:d-m-Y') .
    ', ' .
    $defaultTime->format('h:i');
*/
$defaultTime =
    $defaultTime->format('Y-m-d h:i');

?>

<a name="time"></a>
<h1 class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>
<form>
    <div class="date-calc">

        <div class="date-calc-header">
            <?= Yii::t('app', 'Days between dates calculator') ?>
        </div>

        <div class="date-calc-flex">
            <div class=" col-xxs-12 col-xs-6">
                <div class="date-calc-plate">
                    <?= \kartik\datetime\DateTimePicker::widget([
                        'name' => 'picker1',
                        'type' => \kartik\datetime\DateTimePicker::TYPE_INLINE,
                        'value' => ($calculators->dateOne) ? $calculators->dateOne->format('Y-m-d h:i') : $defaultTime,
                        'pluginOptions' => [
                            'format' => 'yyyy-m-d hh:ii',
                        ]
                    ]); ?>
                </div>
            </div>

            <div class=" col-xxs-12 col-xs-6">
                <div class="date-calc-plate">
                    <?= \kartik\datetime\DateTimePicker::widget([
                        'name' => 'picker2',
                        'layout' => '{picker} {remove} {input}',
                        'type' => \kartik\datetime\DateTimePicker::TYPE_INLINE,
                        'value' => ($calculators->dateTwo) ? $calculators->dateTwo->format('Y-m-d h:i') : $defaultTime,
                        'pluginOptions' => [
                            //'format' => 'D, dd-M-yyyy, hh:ii',
                            'format' => 'yyyy-m-d hh:ii',
                        ]
                    ]); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="date-calc-calculate col-xxs-12">
                <input class="btn btn-success form-button date-calc-calculate-button" type="submit"
                       value="<?= Yii::t('app', 'Calculate') ?>"
                       id="button_calc">
            </div>
        </div>

        <?php if ($calculators->date->result) : ?>
            <hr>
            <div class="row">
                <div class="date-calc-result col-xxs-12">
                    <?= Yii::t('app', 'Difference between date <span class="picker-result-red">{date1}</span> and date <span class="picker-result-red">{date2}</span>', [
                        'date1' => Yii::$app->formatter->asDate($calculators->date->dateOne, 'full') . $calculators->date->dateOne->format(' h:s'),
                        'date2' => Yii::$app->formatter->asDate($calculators->date->dateTwo, 'full') . $calculators->date->dateTwo->format(' h:s'),


                    ]) ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="date-calc-result col-xxs-12">
                    <?= Yii::t('app', '{n,plural, one{# year} few{# years} other{# years}}', [
                        'n' => $calculators->date->dateDiff->format('%y'),
                    ]) ?>
                    <?= ', ' ?>
                    <?= Yii::t('app', '{n,plural, one{# month} few{# months} other{# months}}', [
                        'n' => $calculators->date->dateDiff->format('%m'),
                    ]) ?>
                    <?= ', ' ?>
                    <?= Yii::t('app', '{n,plural, one{# day} few{# days} other{# days}}', [
                        'n' => $calculators->date->dateDiff->format('%d'),
                    ]) ?>
                    <?= ', ' ?>
                    <?= Yii::t('app', '{n,plural, one{# hour} few{# hours} other{# hours}}', [
                        'n' => $calculators->date->dateDiff->format('%h'),
                    ]) ?>
                    <?= ', ' ?>
                    <?= Yii::t('app', '{n,plural, one{# minute} few{# minutes} other{# minutes}}', [
                        'n' => $calculators->date->dateDiff->format('%i'),
                    ]) ?>
                    <?= ', ' ?>
                    <?= Yii::t('app', '{n,plural, one{# second} few{# seconds} other{# seconds}}', [
                        'n' => $calculators->date->dateDiff->format('%s'),
                    ]) ?>

                    <?php
                    /*
                    echo Yii::t('app', '{years} Year {months} Month {days} Day {hours} Hours {minutes} Minute {seconds} Seconds', [
                        'years' => $calculators->dateDiff->format('%y'),
                        'months' => $calculators->dateDiff->format('%m'),
                        'days' => $calculators->dateDiff->format('%d'),
                        'hours' => $calculators->dateDiff->format('%h'),
                        'minutes' => $calculators->dateDiff->format('%i'),
                        'seconds' => $calculators->dateDiff->format('%s'),
                    ])

                    */
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</form>
<hr>
<?php if ($calculators->names->calculators) : ?>
    <div class="row rflex">
        <div class="col-xxs-12 plates">
            <div class="plate-long">
                <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/calculators/">
                    <?= Yii::t('app', 'Time calculator'); ?>
                </a>
                <?= ' / ' ?>
                <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/calculators/names/date/">
                    <?= Yii::t('app', 'Date calculator'); ?>
                </a>
                <?= ' / ' ?>
                <?php foreach ($calculators->names->calculators as $key => $calculator): ?>
                    <a class="plate-a-margin"
                       href="/<?= Yii::$app->language ?>/calculators/names/<?= $calculator['url'] ?>/">
                        <?= $calculator['name'] ?>
                    </a>
                    <?= ' / ' ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <hr>
<?php endif; ?>
