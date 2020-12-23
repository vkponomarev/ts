<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HolidaysTypesText */

$this->title = 'Create Holidays Types Text';
$this->params['breadcrumbs'][] = ['label' => 'Holidays Types Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="holidays-types-text-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'holidaysTypes' => $holidaysTypes,
    ]) ?>

</div>
