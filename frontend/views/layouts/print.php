<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
//echo $this->params['title'];
    //<meta http-equiv="X-UA-Compatible" content="IE=edge">
    //<meta name="viewport" content="width=device-width, initial-scale=1">
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta charset="<?= Yii::$app->charset ?>">

    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body style="width: 100%">
<?php $this->beginBody() ?>
<div style="width: 100%">
        <?= $content ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
