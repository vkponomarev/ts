
Необходимые компоненты:
https://github.com/maxmind/GeoIP2-php
composer require --prefer-dist geoip2/geoip2:~2.0

https://github.com/islamic-network/prayer-times

composer require --prefer-dist islamic-network/prayer-times



<h1>Доки</h1>
<h2 align="left">Введение </h2>


<h2 align="left">Структура приложения</h2>

<h2 align="left">Контроллеры</h2> <br>


common\components Основные компоненты сайта
common\componentsV2 Компоненты новые

frontend/config/main.php
Основной файл кофигурации для фронтэнда

frontend/route/
Все url сайта и привязка контроллеров
За каждый отдельный урл сайта отвечает свой контроллер

frontend/controllers/
Все контроллеры фронтэнда

frontend/controllers/business
Страницы Производственного календаря

frontend/controllers/calendar
Страницы обычного календаря

frontend/controllers/eastern
Страницы восточного календаря

frontend/controllers/holidays
Страницы праздников

frontend/controllers/moon
Страницы лунного календаря

frontend/controllers/religion
Страницы религиозного каледаря

frontend/controllers/time
Страницы времени

frontend/controllers/zodiac
Страницы станицы зодиакального календаря

frontend/controllers/Generate..  
Контроллеры отвечающие за автоматическую генерацию PDF календарей
Пришлось на фронтэнде делать контроллеры (генерирующие вью (хтмл файл готовый) для последующей генерации PDF файла из этго вью) так как только в них нормально генерировался файл вью в котором
все отображалось нормально(календарь). При генерации вью через бэкэнд были неточноси в отрисовке этого вью при генерации.


frontend/views/
Файлы и папки для файлов вью
Логика 

контроллер 
frontend/controllers/business/BusinessDaysOffMonthsController.php

фалы вью
frontend/views/business/business-days-off-months
название папок такое же как и название контроллера


