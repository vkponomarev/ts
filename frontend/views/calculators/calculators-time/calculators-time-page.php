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
    <div class="time-calc">
        <div class="time-calc-header">
            <?= Yii::t('app', 'Calculate time') ?>
        </div>
        <div class="time-calc-flex">
            <div class="col-xxs-12 col-xs-12 col-md-4">
                <div class="time-calc-plate">
                    <input name="time-one" class="time-input" type="time" step="1" value="
                    <?php if ($calculators->time->valueOne) : ?>
                        <?= $calculators->time->valueOne ?>
                    <?php else: ?>
                    00:00:00
                    <?php endif; ?>">
                </div>
            </div>

            <div class="col-xxs-12 col-xs-12 col-md-4">
                <div class="time-calc-plate-middle">
                    <select name="time-method" id="selectID" class="form-control">
                        <option value="addition"
                            <?= ($calculators->time->timeMethod == 'addition')? ' selected ' : ''?>
                            <?= ($methodURL == 'addition' && $calculators->time->timeMethod == '')? ' selected ' : ''?>
                        ><?= Yii::t('app', 'Addition') ?></option>
                        <option value="subtraction"
                            <?=($calculators->time->timeMethod == 'subtraction')? ' selected ' : ''?>
                            <?= ($methodURL == 'subtraction' && $calculators->time->timeMethod == '')? ' selected ' : ''?>
                        ><?= Yii::t('app', 'Subtraction') ?></option>
                        <option value="multiplication"
                            <?=($calculators->time->timeMethod == 'multiplication')? ' selected ' : ''?>
                            <?= ($methodURL == 'multiplication' && $calculators->time->timeMethod == '')? ' selected ' : ''?>
                        ><?= Yii::t('app', 'Multiplication') ?></option>
                        <option value="division"
                            <?=($calculators->time->timeMethod == 'division')? ' selected ' : ''?>
                            <?= ($methodURL == 'division' && $calculators->time->timeMethod == '')? ' selected ' : ''?>
                        ><?= Yii::t('app', 'Division') ?></option>
                    </select>
                </div>
            </div>
            <div class="col-xxs-12 col-xs-12 col-md-4">
                <div class="time-calc-plate">
                    <input name="time-two" class="time-input" type="time"  step="1" value="
                    <?php if ($calculators->time->valueTwo) : ?>
                        <?= $calculators->time->valueTwo ?>
                    <?php else: ?>
                    00:00:00
                    <?php endif; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="time-calc-calculate col-xxs-12">
                <input class="btn btn-success form-button time-calc-calculate-button" type="submit"
                       value="<?= Yii::t('app', 'Calculate') ?>"
                       id="button_calc">
            </div>
        </div>

        <?php if ($calculators->time->result && !$calculators->time->calculationSecondDevisionByZero) : ?>
            <hr>
            <div class="row">
                <div class="time-calc-result col-xxs-12">
                    <?php if ($calculators->time->calculationSecondSign) : ?>
                        <?= '- ' ?>
                    <?php endif; ?>
                    <?= Yii::t('app', '{n,plural, one{# hour} few{# hours} other{# hours}}', [
                        'n' => $calculators->time->calculationSecondHours,
                    ]) ?>
                    <?= ', ' ?>
                    <?= Yii::t('app', '{n,plural, one{# minute} few{# minutes} other{# minutes}}', [
                        'n' => $calculators->time->calculationSecondMinutes,
                    ]) ?>
                    <?= ', ' ?>

                    <?php if ($calculators->time->calculationSecondSeconds - floor($calculators->time->calculationSecondSeconds)) : ?>
                        <?= Yii::t('app', '{n,plural, one{# second} few{# seconds} other{# seconds}}', [
                            'n' => round($calculators->time->calculationSecondSeconds, 2),
                        ]) ?>
                    <?php else: ?>
                        <?= Yii::t('app', '{n,plural, one{# second} few{# seconds} other{# seconds}}', [
                            'n' => $calculators->time->calculationSecondSeconds,
                        ]) ?>
                    <?php endif; ?>

                </div>
            </div>

        <?php endif; ?>

        <?php if ($calculators->time->calculationSecondDevisionByZero) : ?>
            <hr>
            <div class="row">
                <div class="time-calc-result col-xxs-12">
                    <?= Yii::t('app', 'You cannot divide by zero') ?>

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

<div class="row rflex">
    <div class="col-xxs-12 plates">
        <div class="plate-long">
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/calculators/time/addition/">
                <?= Yii::t('app', 'Adding time') ?>
            </a>
            <?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/calculators/time/subtraction/">
                <?= Yii::t('app', 'Subtracting time') ?>
            </a>
            <?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/calculators/time/multiplication/">
                <?= Yii::t('app', 'Time multiplication') ?>
            </a>
            <?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/calculators/time/division/">
                <?= Yii::t('app', 'Divide time') ?>
            </a>
            <?= ' / ' ?>

        </div>
    </div>
</div>
<hr>