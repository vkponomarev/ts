<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $time \common\componentsV2\time\Time
 * @var $date \common\componentsV2\date\Date
 * @var $dateLocation \common\componentsV2\date\Date
 * @var $namaz \common\componentsV2\namaz\Namaz
 *
 *
 */


?>


<a name="calendar-<?= $date->year->current ?>"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<?= $this->render('../namaz-partials/_namaz-row.min.php', [
    'time' => $time,
    'date' => $dateLocation,
    'namaz' => $namaz,
]);
?>


<div class="row rflex">
    <div class="col-xxs-12 plates">
        <div class="plate-long">
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/"><?= Yii::t('app', 'Namaz') ?></a><?= ' / ' ?>

            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/"><?= $time->location->city->name ?></a><?= ' / ' ?>

            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/morning/"><?= Yii::t('app', 'Morning') ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/evening/"><?= Yii::t('app', 'Evening') ?></a><?= ' / ' ?>

            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/years/<?= $date->year->current ?>/"><?= Yii::t('app', 'Year') ?></a><?= ' / ' ?>

            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-01/"><?= $calendarNameOfMonths[1] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-02/"><?= $calendarNameOfMonths[2] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-03/"><?= $calendarNameOfMonths[3] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-04/"><?= $calendarNameOfMonths[4] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-05/"><?= $calendarNameOfMonths[5] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-06/"><?= $calendarNameOfMonths[6] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-07/"><?= $calendarNameOfMonths[7] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-08/"><?= $calendarNameOfMonths[8] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-09/"><?= $calendarNameOfMonths[9] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-10/"><?= $calendarNameOfMonths[10] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-11/"><?= $calendarNameOfMonths[11] ?></a><?= ' / ' ?>
            <a class="plate-a-margin" href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-12/"><?= $calendarNameOfMonths[12] ?></a>
        </div>
    </div>
</div>


<hr>
<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с месяцами туда сюда*/ ?>
<?php /***************************** */ ?>


<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($dateData['year']['previous'] == '0000' && $dateData['month']['numberSimple'] == 1): ?>

        <?php else: ?>
            <?php if ($dateData['month']['numberSimple'] == 1): ?>
                <a href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $dateData['year']['previous'] ?>-<?= str_pad(12, 2, '0', STR_PAD_LEFT) ?>/">
                    <?= $calendarNameOfMonths[12] ?>
                </a>
            <?php else: ?>
                <a href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-<?= str_pad($dateData['month']['numberSimple'] - 1, 2, '0', STR_PAD_LEFT) ?>/">
                    <?= $calendarNameOfMonths[$dateData['month']['numberSimple'] - 1] ?>
                </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">
        <?= $calendarNameOfMonths[$dateData['month']['numberSimple']] ?>
    </div>

    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($date->year->current == '9999' && $dateData['month']['numberSimple'] == 12): ?>

        <?php else: ?>
            <?php if ($dateData['month']['numberSimple'] == 12): ?>
                <a href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $dateData['year']['next'] ?>-<?= str_pad(1, 2, '0', STR_PAD_LEFT) ?>/">
                    <?= $calendarNameOfMonths[1] ?>
                </a>
            <?php else: ?>
                <a href="/<?= Yii::$app->language ?>/namaz/cities/<?= $time->location->city->url ?>/months/<?= $date->year->current ?>-<?= str_pad($dateData['month']['numberSimple'] + 1, 2, '0', STR_PAD_LEFT) ?>/">
                    <?= $calendarNameOfMonths[$dateData['month']['numberSimple'] + 1] ?>
                </a>
            <?php endif; ?>
        <?php endif; ?>


    </div>
</div>
<hr>

<div class="row rflex">
    <?php $dateChange = new DateTime($date->year->current . '-' . $date->month->current . '-' . '01') ?>
    <?php foreach (range(1, $date->month->daysCount) as $one): ?>
        <div class="col-xxs-12 col-xs-6 col-md-4 col-lg-3 namaz-month-day plates">
            <div class="plate-clock">
                <span class="namaz-month-day-title">
                <?= Yii::$app->formatter->asDate($dateChange, 'medium'); ?>
                </span>
                <hr>
                <span class="namaz-month-day-time">
                    <?= $namaz->month->times[$dateChange->format('d')]['Fajr'] ?>
                </span>
                <br>
                <span class="namaz-month-day-time-name">
                <?= Yii::t('app', 'Fajr') ?>
                </span>
                <br>
                <span class="namaz-month-day-time">
                    <?= $namaz->month->times[$dateChange->format('d')]['Sunrise'] ?>
                </span>
                <br>
                <span class="namaz-month-day-time-name">
                <?= Yii::t('app', 'Sunrise') ?>
                </span>
                <br>
                <span class="namaz-month-day-time">
                <?= $namaz->month->times[$dateChange->format('d')]['Dhuhr'] ?><br>
                </span>
                <span class="namaz-month-day-time-name">
                <?= Yii::t('app', 'Dhuhr') ?>
                </span>
                <br>
                <span class="namaz-month-day-time">
                <?= $namaz->month->times[$dateChange->format('d')]['Asr'] ?><br>
                </span>
                <span class="namaz-month-day-time-name">
                <?= Yii::t('app', 'Asr') ?>
                </span>
                <br>
                <span class="namaz-month-day-time">
                <?= $namaz->month->times[$dateChange->format('d')]['Maghrib'] ?><br>
                </span>
                <span class="namaz-month-day-time-name">
                <?= Yii::t('app', 'Maghrib') ?>
                </span>
                <br>
                <span class="namaz-month-day-time">
                <?= $namaz->month->times[$dateChange->format('d')]['Isha'] ?><br>
                </span>
                <span class="namaz-month-day-time-name">
                <?= Yii::t('app', 'Isha') ?>
                </span>
                <br>
                <?php $dateChange->modify('+1 day') ?>
            </div>
        </div>
    <?php endforeach ?>
</div>




