<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HolidaysTypes */

$this->title = 'Create Holidays Types';
$this->params['breadcrumbs'][] = ['label' => 'Holidays Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="holidays-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
