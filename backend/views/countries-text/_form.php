<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CountriesText */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="countries-text-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'countries_id')->textInput(['value'=>$countries])->hiddenInput(['value' => $countries])->label(false) ?>

    <?= $form->field($model, 'languages_id')->textInput(['value'=>$languages])->hiddenInput(['value' => $languages])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
