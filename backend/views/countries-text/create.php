<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CountriesText */
$this->title = 'Create Countries Text';
$this->params['breadcrumbs'][] = ['label' => 'Countries Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-text-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'countries' => $countries,
    ]) ?>

</div>
