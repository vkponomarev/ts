<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HolidaysTypes */

$this->title = 'Update Holidays Types: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Holidays Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="holidays-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
