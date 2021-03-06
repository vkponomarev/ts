




    <?php $dateFormat = new \DateTime($model['date']) ?>
    <div class="h-table-line">
        <div class="h-table-td-first">
            <?= Yii::$app->formatter->asDate($model['date'], 'medium'); ?>
        </div>
        <div class="h-table-td">
            <a href="/<?= Yii::$app->language ?>/holidays/<?= $model['holidayUrl'] ?>/<?= ($countryURL['url'] <> '') ? $countryURL['url'] . '/' : '' ?>">
                <?= $model['holidayName'] ?>
            </a>
        </div>
        <div class="h-table-td">

            <?= $model['holidayTypeName'] ?>

        </div>
        <div class="h-table-td">
            <?php if ($countryData) : ?>
                <?= $model['countryName'] ?>
            <?php else: ?>
                <a href="/<?= Yii::$app->language ?>/holidays/years/<?= $date->year->current ?>/<?= $model['countryUrl'] ?>/">
                    <?= $model['countryName'] ?>
                </a>

            <?php endif; ?>

        </div>
    </div>
