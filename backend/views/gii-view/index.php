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

            <option value="---------">-------------------</option>
            <option value="PDF-calendar-yearly">Создание PDF Календаря на ГОД</option>
            <option value="PDF-calendar-seasons">Создание PDF Календаря на СЕЗОНЫ ГОДА</option>
            <option value="PDF-calendar-monthly">Создание PDF Календаря на МЕСЯЦЫ ГОДА</option>
        </select>

        <br>


        <label for="exampleForm2">Значение от</label>
        <input type="text" id="exampleForm2" class="form-control" name="value-one">
        <label for="exampleForm3">Значение до</label>
        <input type="text" id="exampleForm3" class="form-control" name="value-two">
        <br>
        <input class="btn btn-success form-button" type="submit" value="<?= Yii::t('app', 'Создать') ?>"
               id="button_calc">

    </form>




</div>

