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
            <option value="PDF-calendar-yearly-with-weeks">Создание PDF Календаря на ГОД С НЕДЕЛЯМИ</option>
            <option value="PDF-calendar-seasons">Создание PDF Календаря на СЕЗОНЫ ГОДА</option>
            <option value="PDF-calendar-monthly">Создание PDF Календаря на МЕСЯЦЫ ГОДА</option>
            <option value="PDF-calendar-weekly">Создание PDF Календаря на НЕДЕЛИ</option>

            <option value="PDF-calendar-business-yearly">Создание PDF Производственного Календаря на ГОД</option>

            <option value="PDF-calendar-moon-yearly">Создание PDF Лунного Календаря на ГОД</option>

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

    <p>
        Создание PDF Календаря на ГОД<br>
        Создается календраь на год с праздниками(если есть праздники для года и страны) и без праздников.
        С праздниками : frontend/web/calendars-pdf/country-name-1223/yearly/name-of-calendar.pdf
        Без праздников : frontend/web/calendars-pdf/no-holidays/yearly/name-of-calendar.pdf
    </p>




</div>

