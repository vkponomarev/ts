<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\MailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Create SiteMap';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="mail-index">

    <form action="" method="post">

        <div class="form-left-title"><?= Yii::t('app', 'Выберите что будете создавать:') ?></div>

        <select id="cycle-length-from" name="name" class="form-control select-extended">

            <option value="---------------">---------------</option>
            <option value="sitemap-calendar-yearly-all">Карта сайта для календаря на ГОД все языки</option>

            <option value="sitemap-calendar-seasons-all">Карта сайта для календаря на СЕЗОНЫ ГОДА все языки</option>
            <option value="sitemap-calendar-seasons-ru">Карта сайта для календаря на СЕЗОНЫ ГОДА только RU</option>


            <option value="sitemap-all">Карта сайта основной файл все языки</option>

            <option value="sitemap-ru">Карта сайта основной файл только RU</option>


        </select>

        <br>


        <input class="btn btn-success form-button" type="submit" value="<?= Yii::t('app', 'Создать') ?>"
               id="button_calc">

    </form>




</div>

