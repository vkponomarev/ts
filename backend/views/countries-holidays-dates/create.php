<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CountriesHolidaysDates */

$this->title = 'Create Countries Holidays Dates';
$this->params['breadcrumbs'][] = ['label' => 'Countries Holidays Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-holidays-dates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
