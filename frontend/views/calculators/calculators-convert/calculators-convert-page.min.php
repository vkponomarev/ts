<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 * @var $calculators \common\componentsV2\calculators\Calculators
 */


?><script></script><?php if ($time->geoIP->active == 1) : ?><?php $defaultTime = $time->geoIP->city->date; ?><?php else: ?><?php $defaultTime = $date->time ?><?php endif; ?><?php
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

?><a name=time></a><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><hr><form><div class=time-calc><div class=time-calc-header><?= $calculators->current->calculator->calculator['nameConvertCalcHeader'] ?></div><div class=time-calc-flex><div class="col-xxs-12 col-md-6 col-xs-12"><div class=time-calc-plate><input class="conversion-input conversion-input-left"type=tel value="<?= ($calculators->conversion->first->value) ? $calculators->conversion->first->value : 1 ?>"aria-label="Phone Number"name=first-value> <select class="form-control conversion-left-select"id=selectID name=first-value-name dir=rtl><?php foreach ($calculators->names->calculators as $key => $calculator): ?><option value="<?= $calculator['url'] ?>"<?= ($calculator['url'] == $calculators->conversion->first->name) ? ' selected ' : '' ?>><?= $calculator['nameConvertCalcSelect'] ?></option><?php endforeach ?></select></div></div><div class="col-xxs-12 col-md-6 col-xs-12"><div class=time-calc-plate><input class="conversion-input conversion-input-right"type=tel value="<?= ($calculators->conversion->second->value) ? $calculators->conversion->second->value : 0 ?>"aria-label="Phone Number"name=second-value> <select class="form-control conversion-right-select"id=selectID name=second-value-name><?php foreach ($calculators->names->calculators as $key => $calculator): ?><option value="<?= $calculator['url'] ?>"<?= ($calculator['url'] == $calculators->conversion->second->name) ? ' selected ' : '' ?>><?= $calculator['nameConvertCalcSelect'] ?></option><?php endforeach ?></select></div></div></div><div class=row><div class="col-xxs-12 time-calc-calculate"><input class="btn btn-success form-button time-calc-calculate-button"type=submit value="<?= Yii::t('app', 'Calculate') ?>"id=button_calc></div></div><?php if ($calculators->time->result && !$calculators->time->calculationSecondDevisionByZero) : ?><hr><div class=row><div class="col-xxs-12 time-calc-result"><?php if ($calculators->time->calculationSecondSign) : ?><?= '- ' ?><?php endif; ?><?= Yii::t('app', '{n,plural, one{# hour} few{# hours} other{# hours}}', [
                        'n' => $calculators->time->calculationSecondHours,
                    ]) ?><?= ', ' ?><?= Yii::t('app', '{n,plural, one{# minute} few{# minutes} other{# minutes}}', [
                        'n' => $calculators->time->calculationSecondMinutes,
                    ]) ?><?= ', ' ?><?php if ($calculators->time->calculationSecondSeconds - floor($calculators->time->calculationSecondSeconds)) : ?><?= Yii::t('app', '{n,plural, one{# second} few{# seconds} other{# seconds}}', [
                            'n' => round($calculators->time->calculationSecondSeconds, 2),
                        ]) ?><?php else: ?><?= Yii::t('app', '{n,plural, one{# second} few{# seconds} other{# seconds}}', [
                            'n' => $calculators->time->calculationSecondSeconds,
                        ]) ?><?php endif; ?></div></div><?php endif; ?><?php if ($calculators->time->calculationSecondDevisionByZero) : ?><hr><div class=row><div class="col-xxs-12 time-calc-result"><?= Yii::t('app', 'You cannot divide by zero') ?></div></div><?php endif; ?></div></form><hr><?php if ($calculators->names->calculators) : ?><div class="row rflex"><div class="col-xxs-12 plates"><div class=plate-long><a class=plate-a-margin href="/<?= Yii::$app->language ?>/calculators/"><?= Yii::t('app', 'Time calculator'); ?></a><?= ' / ' ?><a class=plate-a-margin href="/<?= Yii::$app->language ?>/calculators/names/date/"><?= Yii::t('app', 'Date calculator'); ?></a><?= ' / ' ?><?php foreach ($calculators->names->calculators as $key => $calculator): ?><a class=plate-a-margin href="/<?= Yii::$app->language ?>/calculators/names/<?= $calculator['url'] ?>/"><?= $calculator['name'] ?></a><?= ' / ' ?><?php endforeach ?></div></div></div><hr><?php endif; ?><?php if ($calculators->toTimeLinks) : ?><div class="row rflex"><div class="col-xxs-12 plates"><div class=plate-long><?php foreach ($calculators->toTimeLinks as $key => $link): ?><a class=plate-a-margin href="/<?= Yii::$app->language ?>/calculators/convert/<?= $calculators->current->calculator->calculator['url'] ?>/<?= $calculators->second->calculator->calculator['url'] ?>/<?= $link ?>/"><?= $link ?></a><?= ' / ' ?><?php endforeach ?></div></div></div><hr><?php endif; ?><?php if ($calculators->toHowManyLinks) : ?><div class="row rflex"><div class="col-xxs-12 plates"><div class=plate-long><?php foreach ($calculators->toHowManyLinks as $key => $link): ?><a class=plate-a-margin href="/<?= Yii::$app->language ?>/calculators/how-many/<?= $link['url'] ?>/"><?= $link['textHowMany'] ?></a><?= ' / ' ?><?php endforeach ?></div></div></div><hr><?php endif; ?><?php if ($calculators->current->calculator->calculator['links']) : ?><div class="row rflex"><div class="col-xxs-12 plates"><div class=plate-long><?php foreach ($calculators->toHowManyLinks as $key => $link): ?><a class=plate-a-margin href="/<?= Yii::$app->language ?>/calculators/convert/<?= $link['url'] ?>/"><?= Yii::t('appDiff', 'Convert {fromTo}', [
                        'fromTo' => $link['text'],
                    ]); ?></a><?= ' / ' ?><?php endforeach ?></div></div></div><hr><?php endif; ?>