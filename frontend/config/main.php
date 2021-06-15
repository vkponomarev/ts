<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',

    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'layout' => 'main.min.php',
    'components' => [
        //'geoip' => [
         //   'class' => 'lysenkobv\GeoIP\GeoIP',
        //    'dbPath' => Yii::getAlias('@common/components/geoIP/GeoLite2-City.mmdb')
        //],
        'html2pdf' => [
            'class' => 'yii2tech\html2pdf\Manager',
            'viewPath' => '@app/views/pdf',
            'converter' => 'wkhtmltopdf',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer'
        ],
        'request' => [
            'baseUrl' => '', //убрать frontend/web
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'timesles',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['en', 'ru', 'es', 'pt', 'ja', 'de', 'ko', 'fr', 'jv', 'vi', 'it', 'tr', 'uk', 'th', 'pl', 'az', 'ro', 'uz', 'hu', 'el', 'cs', 'zh', 'hi', 'bn'],
            'enableDefaultLanguageUrlCode' => true,
            'rules' => array_merge(
                require __DIR__ . '/../../frontend/config/route/main.php',
                require __DIR__ . '/../../frontend/config/route/calendar.php',
                require __DIR__ . '/../../frontend/config/route/calendar-business.php',
                require __DIR__ . '/../../frontend/config/route/calendar-eastern.php',
                require __DIR__ . '/../../frontend/config/route/calendar-zodiac.php',
                require __DIR__ . '/../../frontend/config/route/calendar-moon.php',
                require __DIR__ . '/../../frontend/config/route/holidays.php',
                require __DIR__ . '/../../frontend/config/route/time.php',
                require __DIR__ . '/../../frontend/config/route/cms.php',
                require __DIR__ . '/../../frontend/config/route/other.php'
            ),
            'suffix' => '/',
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'normalizeTrailingSlash' => true,
                'collapseSlashes' => true,
            ],

        ],

        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',

                ],
            ],
        ],
    ],
    'sourceLanguage' => 'en',
    'language' => 'en',
    'params' => $params,
];
