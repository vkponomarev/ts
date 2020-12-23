<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CountriesHolidaysDates */

$this->title = 'Update Countries Holidays Dates: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Countries Holidays Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="countries-holidays-dates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
