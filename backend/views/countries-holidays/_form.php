<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CountriesHolidays */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="countries-holidays-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'countries_id')->textInput() ?>

    <?= $form->field($model, 'holidays_id')->textInput() ?>

    <?= $form->field($model, 'diff_dates')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'count_days_off')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
