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

            <option value="sitemap-calculators-all">Карта сайта КАЛЬКУЛЯТОРЫ все языки</option>

            <option value="sitemap-namaz-cities-all">Карта сайта НАМАЗ ГОРОДА все языки</option>
            <option value="sitemap-namaz-cities-months-all">Карта сайта НАМАЗ ГОРОДА МЕСЯЦЫ все языки</option>
            <option value="sitemap-namaz-cities-years-all">Карта сайта НАМАЗ ГОРОДА ГОДА все языки</option>
            <option value="sitemap-namaz-cities-times-all">Карта сайта НАМАЗ УТРО ВЕЧЕР все языки</option>

            <option value="sitemap-time-cities-all">Карта сайта Время ГОРОДА все языки</option>
            <option value="sitemap-time-countries-all">Карта сайта Время СТРАНЫ все языки</option>
            <option value="sitemap-time-continents-all">Карта сайта Время КОНТИНЕНТЫ все языки</option>
            <option value="sitemap-time-capitals-all">Карта сайта Время СТОЛИЦЫ все языки</option>
            <option value="sitemap-time-abbr-all">Карта сайта Время ЧАСОВЫЕ ПОЯСА АББРЕВИАТУРЫ все языки</option>
            <option value="sitemap-time-iana-all">Карта сайта Время ЧАСОВЫЕ ПОЯСА IANA все языки</option>
            <option value="sitemap-time-difference-city-all">Карта сайта Время РАЗНИЦА ВО ВРЕМЕНИ ГОРОД все языки</option>
            <option value="sitemap-time-difference-city-city-all">Карта сайта Время РАЗНИЦА ВО ВРЕМЕНИ ГОРОД + ГОРОДА все языки</option>

            <option value="sitemap-calendar-yearly-all">Карта сайта для календаря на ГОД все языки</option>
            <option value="sitemap-calendar-yearly-ru">Карта сайта для календаря на ГОД только RU</option>

            <option value="sitemap-calendar-years-with-weeks-all">Карта сайта для календаря на ГОД С НОМЕРАМИ НЕДЕЛЬ все языки</option>
            <option value="sitemap-calendar-years-with-weeks-ru">Карта сайта для календаря на ГОД С НОМЕРАМИ НЕДЕЛЬ только RU</option>


            <option value="sitemap-calendar-seasons-all">Карта сайта для календаря на СЕЗОНЫ ГОДА все языки</option>
            <option value="sitemap-calendar-seasons-ru">Карта сайта для календаря на СЕЗОНЫ ГОДА только RU</option>

            <option value="sitemap-calendar-months-all">Карта сайта для календаря на МЕСЯЦ все языки</option>
            <option value="sitemap-calendar-months-ru">Карта сайта для календаря на МЕСЯЦ только RU</option>

            <option value="sitemap-calendar-weeks-all">Карта сайта для календаря на НЕДЕЛЮ все языки</option>
            <option value="sitemap-calendar-weeks-ru">Карта сайта для календаря на НЕДЕЛЮ только RU</option>


            <option value="sitemap-calendar-business-years-all">Карта сайта для БИЗНЕС календаря на ГОД все языки</option>
            <option value="sitemap-calendar-business-years-ru">Карта сайта для БИЗНЕС календаря на ГОД только RU</option>
            <option value="sitemap-calendar-business-quarters-all">Карта сайта для БИЗНЕС календаря на КВАРТАЛ все языки</option>
            <option value="sitemap-calendar-business-quarters-ru">Карта сайта для БИЗНЕС календаря на КВАРТАЛ только RU</option>
            <option value="sitemap-calendar-business-months-all">Карта сайта для БИЗНЕС календаря на МЕСЯЦ все языки</option>
            <option value="sitemap-calendar-business-months-ru">Карта сайта для БИЗНЕС календаря на МЕСЯЦ только RU</option>

            <option value="sitemap-calendar-moon-years-all">Карта сайта для ЛУННОГО календаря на ГОД все языки</option>
            <option value="sitemap-calendar-moon-years-ru">Карта сайта для ЛУННОГО календаря на ГОД только RU</option>

            <option value="sitemap-calendar-moon-months-all">Карта сайта для ЛУННОГО календаря на МЕСЯЦ все языки</option>
            <option value="sitemap-calendar-moon-months-ru">Карта сайта для ЛУННОГО календаря на МЕСЯЦ только RU</option>

            <option value="sitemap-calendar-moon-good-years-all">Карта сайта для ЛУННОГО календаря БЛАГОПРИЯТНЫХ ДНЕЙ на ГОД все языки</option>
            <option value="sitemap-calendar-moon-good-years-ru">Карта сайта для ЛУННОГО календаря БЛАГОПРИЯТНЫХ ДНЕЙ на ГОД только RU</option>
            <option value="sitemap-calendar-moon-good-months-all">Карта сайта для ЛУННОГО календаря БЛАГОПРИЯТНЫХ ДНЕЙ на МЕСЯЦ все языки</option>
            <option value="sitemap-calendar-moon-good-months-ru">Карта сайта для ЛУННОГО календаря БЛАГОПРИЯТНЫХ ДНЕЙ на МЕСЯЦ только RU</option>

            <option value="sitemap-calendar-moon-gardener-years-all">Карта сайта для ЛУННОГО ПОСЕВНОГО календаря на ГОД все языки</option>
            <option value="sitemap-calendar-moon-gardener-years-ru">Карта сайта для ЛУННОГО ПОСЕВНОГО календаря на ГОД только RU</option>
            <option value="sitemap-calendar-moon-gardener-months-all">Карта сайта для ЛУННОГО ПОСЕВНОГО календаря на МЕСЯЦ все языки</option>
            <option value="sitemap-calendar-moon-gardener-months-ru">Карта сайта для ЛУННОГО ПОСЕВНОГО календаря на МЕСЯЦ только RU</option>

            <option value="sitemap-calendar-moon-phases-years-all">Карта сайта для ФАЗЫ ЛУНЫ на ГОД все языки</option>
            <option value="sitemap-calendar-moon-phases-years-ru">Карта сайта для ФАЗЫ ЛУНЫ на ГОД только RU</option>
            <option value="sitemap-calendar-moon-phases-months-all">Карта сайта для ФАЗЫ ЛУНЫ на МЕСЯЦ все языки</option>
            <option value="sitemap-calendar-moon-phases-months-ru">Карта сайта для ФАЗЫ ЛУНЫ на МЕСЯЦ только RU</option>

            <option value="sitemap-calendar-working-days-off-years-all">Карта сайта для ВЫХОДНЫХ И РАБОЧИХ ДНЕЙ календаря на ГОД все языки</option>
            <option value="sitemap-calendar-working-days-off-years-ru">Карта сайта для ВЫХОДНЫХ И РАБОЧИХ ДНЕЙ календаря на ГОД только RU</option>

            <option value="sitemap-calendar-working-days-off-months-all">Карта сайта для ВЫХОДНЫХ И РАБОЧИХ ДНЕЙ календаря на МЕСЯЦ все языки</option>
            <option value="sitemap-calendar-working-days-off-months-ru">Карта сайта для ВЫХОДНЫХ И РАБОЧИХ ДНЕЙ календаря на МЕСЯЦ только RU</option>


            <option value="sitemap-calendar-religion-years-all">Карта сайта для РЕЛИГИОЗНОГО календаря на ГОД все языки</option>
            <option value="sitemap-calendar-religion-years-ru">Карта сайта для РЕЛИГИОЗНОГО календаря на ГОД только RU</option>
            <option value="sitemap-calendar-religion-months-all">Карта сайта для РЕЛИГИОЗНОГО календаря на МЕСЯЦ все языки</option>
            <option value="sitemap-calendar-religion-months-ru">Карта сайта для РЕЛИГИОЗНОГО календаря на МЕСЯЦ только RU</option>

            <option value="sitemap-calendar-eastern-all">Карта сайта для ВОСТОЧНОГО календаря все языки</option>
            <option value="sitemap-calendar-eastern-ru">Карта сайта для ВОСТОЧНОГО календаря только RU</option>

            <option value="sitemap-calendar-zodiac-all">Карта сайта для ЗОДИАКА календаря все языки</option>
            <option value="sitemap-calendar-zodiac-ru">Карта сайта для ЗОДИАКА календаря только RU</option>

            <option value="sitemap-calendar-holidays-all">Карта сайта для ПРАЗДНИКИ все языки</option>
            <option value="sitemap-calendar-holidays-ru">Карта сайта для ПРАЗДНИКИ только RU</option>

            <option value="sitemap-calendar-holidays-days-all">Карта сайта для ПРАЗДНИКИ НА ДЕНЬ все языки и РУ отдельно</option>

            <option value="sitemap-calendar-days-all">Карта сайта для ПО ДНЯМ(лунные сутки, фаза луны, неделя, знак зодиака) все языки и РУ отдельно</option>

            <option value="sitemap-all">Карта сайта основной файл все языки</option>

            <option value="sitemap-ru">Карта сайта основной файл только RU</option>


        </select>

        <br>


        <input class="btn btn-success form-button" type="submit" value="<?= Yii::t('app', 'Создать') ?>"
               id="button_calc">

    </form>




</div>

