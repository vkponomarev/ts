<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CountriesHolidays */

$this->title = 'Create Countries Holidays';
$this->params['breadcrumbs'][] = ['label' => 'Countries Holidays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-holidays-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
