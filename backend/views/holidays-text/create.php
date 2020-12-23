<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HolidaysText */

$this->title = 'Create Holidays Text';
$this->params['breadcrumbs'][] = ['label' => 'Holidays Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="holidays-text-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'holidays' => $holidays,
    ]) ?>

</div>
