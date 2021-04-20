<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\MailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Скрипты';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="mail-index">

    <form action="" method="post">

        <div class="form-left-title"><?= Yii::t('app', 'Выберите что будете создавать:') ?></div>

        <select id="cycle-length-from" name="name" class="form-control select-extended" onchange="getNewVal(this);">
            <option value="---------------">---------------</option>
            <option value="scripts-make-url">Сделать url для таблицы по определенному полю</option>
            <option value="scripts-add-eng-translations">Добавить английские переводы во вновь созданные таблицы для переводов name name_in name_for</option>
            <option value="scripts-add-eng-translations-one-field">Добавить английские переводы во вновь созданные таблицы для переводов одно поле</option>
            <option value="scripts-translations">Добавляем все переводы определенной таблицы name name_in name_for</option>
            <option value="scripts-translations-one-field">Добавляем все переводы определенной таблицы Одно Поле</option>
            <option value="scripts-standard">Стандартный скрипт</option>
        </select>

        <br>
        <div class="elements" id="scripts-make-url" style="display: block"><br>
            <label for="exampleForm2">Название таблицы</label>
            <input type="text" id="exampleForm2" class="form-control" name="table-name">
            <label for="exampleForm3">Название поля таблицы</label>
            <input type="text" id="exampleForm3" class="form-control" name="field-name">

        </div>


        <div class="elements" id="scripts-add-eng-translations" style="display: block"><br>
            <label for="exampleForm2">Название таблицы добавление ENG</label>
            <input type="text" id="exampleForm2" class="form-control" name="table-name-eng">
            <label for="exampleForm3">Название поля таблицы добавление ENG</label>
            <input type="text" id="exampleForm3" class="form-control" name="field-name-eng">

        </div>
        <div class="elements" id="scripts-add-eng-translations-one-field" style="display: block"><br>
            <label for="exampleForm2">Название таблицы добавление ENG</label>
            <input type="text" id="exampleForm2" class="form-control" name="table-name-eng-one-field">
            <label for="exampleForm3">Название поля таблицы добавление ENG</label>
            <input type="text" id="exampleForm3" class="form-control" name="field-name-eng-one-field">

        </div>

        <div class="elements" id="scripts-translations" style="display: block"><br>
            <label for="exampleForm2">Название таблицы для перевода</label>
            <input type="text" id="exampleForm2" class="form-control" name="tableNameAll">
            <label for="exampleForm2">Лимит начало</label>
            <input type="text" id="exampleForm2" class="form-control" name="limitStart">
            <label for="exampleForm2">Лимит конец</label>
            <input type="text" id="exampleForm2" class="form-control" name="limitEnd">
        </div>

        <div class="elements" id="scripts-translations-one-field" style="display: block"><br>
            <label for="exampleForm2">Название таблицы для перевода</label>
            <input type="text" id="exampleForm2" class="form-control" name="tableNameOneField">
            <label for="exampleForm2">Название поля</label>
            <input type="text" id="exampleForm2" class="form-control" name="fieldNameOneField">
            <label for="exampleForm2">Лимит начало</label>
            <input type="text" id="exampleForm2" class="form-control" name="limitStartOneField">
            <label for="exampleForm2">Лимит конец</label>
            <input type="text" id="exampleForm2" class="form-control" name="limitEndOneField">
        </div>

        <br>
        <input class="btn btn-success form-button" type="submit" value="<?= Yii::t('app', 'Создать') ?>"
               id="button_calc">
    </form>


</div>

<script>
    var allElements = document.getElementsByClassName("elements");
    for (var i=0; i < allElements.length; i++)
    {
        allElements[i].setAttribute('style','display: none');
    }

    function getNewVal(item)
    {
        for (var i=0; i < allElements.length; i++)
        {
            allElements[i].setAttribute('style','display: none');
        }

        var thisDiv = document.getElementById(item.value);

        thisDiv.setAttribute('style','display: block')
    }







</script>