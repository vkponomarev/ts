<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CountriesText */

$this->title = 'Update Countries Text: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Countries Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="countries-text-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'countries' => $countries,
    ]) ?>

</div>
