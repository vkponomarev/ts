<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CountriesTextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries Texts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-text-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Countries Text', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'countries_id',
            'languages_id',
            'title',
            'h1',
            //'description:ntext',
            //'keywords',
            //'text1:ntext',
            //'text2:ntext',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
