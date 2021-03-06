<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var Yii::$app->params['breadcrumbs'] \common\components\breadcrumbs\Breadcrumbs */

?>
<br><br>
<?php if (isset(Yii::$app->params['breadcrumbs'])): ?>
    <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
            itemtype="http://schema.org/ListItem">
            <a href="/<?= Yii::$app->language ?>/" itemprop="item">
                        <span itemprop="name">
                        <?= Yii::t('app', 'Home') ?>
                        </span>
            </a>
            <meta itemprop="position" content="1"/>
        </li>
        <?php if (isset(Yii::$app->params['breadcrumbs']['urls'])): ?>
            <?php $count = 1; ?>
            <?php foreach (Yii::$app->params['breadcrumbs']['urls'] as $one): ?>
                <?php $count++; ?>
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    / <a href="/<?= Yii::$app->language ?>/<?= $one['url'] ?>/" itemprop="item">
                    <span itemprop="name">
                        <?= $one['text'] ?>
                    </span>
                    </a>
                    <meta itemprop="position" content="<?= $count ?>"/>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (isset(Yii::$app->params['breadcrumbs']['last'])): ?>
            <li class="breadcrumbs-item">
                / <span>
                <?= Yii::$app->params['breadcrumbs']['last'] ?>
            </span>
            </li>
        <?php endif; ?>

    </ol>
<?php endif; ?>
<br><br>
