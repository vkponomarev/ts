<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CountriesHolidaysSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="countries-holidays-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'countries_id') ?>

    <?= $form->field($model, 'holidays_id') ?>

    <?= $form->field($model, 'diff_dates') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'count_days_off') ?>

    <?php // echo $form->field($model, 'type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
