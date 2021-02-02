
<?php if ($dateData['year']['current'] >= 2000 && $dateData['year']['current'] <= 2030): ?>
    <br>
    <a name="calendars-of-holidays-and-weekends-in-<?= $dateData['year']['current'] ?>-for-other-countries"></a>
    <h2 class="main-page-h1">
        <?= Yii::t('app', 'Календари с праздниками на 2020 год для других стран', [
            'year' => $dateData['year']['current'],
        ]) ?>
    </h2>

    <br><br>
    <div class="row rflex">

        <?php foreach ($countriesData as $country) : ?>
            <div class="col-xxs-12 col-xs-6 col-md-4 holidays-names-line">
                <a href="/calendar/years/<?= $dateData['year']['current'] ?>/?country=<?= $country['id'] ?>">
                    <?= $country['name']; ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <br>

<?php endif; ?>
