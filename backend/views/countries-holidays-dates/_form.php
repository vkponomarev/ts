<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CountriesHolidaysDates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="countries-holidays-dates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'countries_id')->textInput() ?>

    <?= $form->field($model, 'holidays_id')->textInput() ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
