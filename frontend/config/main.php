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
            'rules' => [
                '/' => 'main-page/index',
                '/calendar/customize/' => 'customize/customize-page',

                //'/calendar/years/<url>' => 'years/year-page',
                //'/calendar/months/<urlMonth>' => 'months/month-page',
                //'/calendar/days/<urlDay>' => 'days/day-page',


                [
                    'pattern' => '/calendar/days-off/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'days-off-years/days-off-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/days-off/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'days-off-months/days-off-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/working/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'working-days-years/working-days-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/working/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'working-days-months/working-days-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'business-months/business-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/forty/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'business-forty-years/business-forty-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/forty/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'business-forty-months/business-forty-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/thirty/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'business-thirty-years/business-thirty-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/thirty/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'business-thirty-months/business-thirty-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/business/six-days/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'business-six-days/business-six-days-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/six-days/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'business-six-days-months/business-six-days-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/quarters/<yearURL:\d{4}>/<quarterURL:\d{1}>/<countryURL:[\w_-]+>',
                    'route' => 'business-quarters/business-quarter-page',
                    'defaults' => ['yearURL' => '', 'quarterURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'years/year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/seasons/<seasonURL:(winter|spring|summer|autumn)>/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'seasons/season',
                    'defaults' => ['yearURL' => '', 'seasonURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'months/month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],

                /*[
                    'pattern' => '/calendar/moon/months/<yearURL:\d{4}>',
                    'route' => 'moon-years/moon-year-page',
                    'defaults' => ['yearURL' => ''],
                ],*/

                /*[
                    'pattern' => '/calendar/moon/years/<yearURL:\d{4}>',
                    'route' => 'moon-years/moon-year-page',
                    'defaults' => ['yearURL' => ''],
                ],*/

                [
                    'pattern' => '/calendar/moon/good/years/<yearURL:\d{4}>/<dayNameURL:[\w_-]+>',
                    'route' => 'moon-years-good/moon-year-good-page',
                    'defaults' => ['dayNameURL' => '', 'yearURL' => ''],
                ],

                [
                    'pattern' => '/calendar/moon/good/months/<monthURL>/<dayNameURL:[\w_-]+>',
                    'route' => 'moon-months-good/moon-month-good-page',
                    'defaults' => ['dayNameURL' => '', 'monthURL' => ''],
                ],

                [
                    'pattern' => '/calendar/moon/gardener/years/<yearURL:\d{4}>/<gardenerNameURL:[\w_-]+>',
                    'route' => 'moon-years-gardener/moon-year-gardener-page',
                    'defaults' => ['gardenerNameURL' => '', 'yearURL' => ''],
                ],

                [
                    'pattern' => '/calendar/moon/gardener/months/<monthURL>/<gardenerNameURL:[\w_-]+>',
                    'route' => 'moon-months-gardener/moon-month-gardener-page',
                    'defaults' => ['gardenerNameURL' => '', 'monthURL' => ''],
                ],


                [
                    'pattern' => '/calendar/moon/phases/years/<yearURL:\d{4}>/<phaseURL:[\w_-]+>',
                    'route' => 'moon-years-phases/moon-year-phase-page',
                    'defaults' => ['phaseURL' => '', 'yearURL' => ''],
                ],

                [
                    'pattern' => '/calendar/moon/phases/months/<monthURL>/<phaseURL:[\w_-]+>',
                    'route' => 'moon-months-phases/moon-month-phase-page',
                    'defaults' => ['phaseURL' => '', 'monthURL' => ''],
                ],


                '/calendar/moon/months/<monthURL>' => 'moon-months/moon-month-page',
                '/calendar/moon/years/<yearURL:\d{4}>' => 'moon-years/moon-year-page',

                '/calendar/weeks/<yearURL:\d{4}>' => 'weeks/year-weeks-page',
                '/calendar/weeks/<yearURL:\d{4}>/week-now' => 'weeks/week-now',
                '/calendar/weeks/<yearURL:\d{4}>/<weekURL:\d{2}>' => 'weeks/week-page',


                /*[
                    'pattern' => '/calendar/weeks/<yearURL:\d{4}>/<weekURL:\d{2}>',
                    'route' => 'weeks/week-page',
                    'defaults' => ['yearURL' => '', 'weekURL' => ''],
                ],*/

                /*[
                    'pattern' => '/calendar/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'months/month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],*/

                //'/calendar/seasons/<season:[\w_-]+>/<year:\d+>' => 'seasons/season',
                /*'/calendar/seasons/winter/<urlYear>' => 'seasons/winter',
                '/calendar/seasons/spring/<urlYear>' => 'seasons/spring',
                '/calendar/seasons/summer/<urlYear>' => 'seasons/summer',
                '/calendar/seasons/autumn/<urlYear>' => 'seasons/autumn',
                */

                /*'/seasons/winter/<urlYear>' => 'years/winter',
                '/seasons/spring/<urlYear>' => 'years/spring',
                '/seasons/summer/<urlYear>' => 'years/summer',
                '/seasons/autumn/<urlYear>' => 'years/autumn',*/

                '/gii/generate-moon-years-pdf/' => 'generate-moon-years/generate-pdf',
                '/gii/generate-business-years-pdf/' => 'generate-business-years/generate-pdf',
                '/gii/generate-weeks-pdf/' => 'generate-weeks/generate-pdf',
                '/gii/generate-years-with-weeks-pdf/' => 'generate-years-with-weeks/generate-pdf',
                '/gii/generate-months-pdf/' => 'generate-months/generate-pdf',
                '/gii/generate-seasons-pdf/' => 'generate-seasons/generate-pdf',
                '/gii/generate-pdf/' => 'generate/generate-pdf',
                '/print/calendar/' => 'print/print-calendar',
                '/print/calendar-test/' => 'print/print-calendar-test',
                //CMS

                '/cms/cookie/' => 'cms/cookie-info',
                '/cms/policy/' => 'cms/policy',
                '/cms/user-agreement/' => 'cms/user-agreement',
                '/cms/copyright/' => 'cms/copyright',

                '/script' => 'scripts/script',

                '/script/translation' => 'scripts/translation',
                '/script/translation2' => 'scripts/translation2',
                '/script/translation3' => 'scripts/translation3',
            ],

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

        /*'view' => [
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => !YII_DEBUG,
            'concatCss' => true, // concatenate css
            'minifyCss' => true, // minificate css
            'concatJs' => true, // concatenate js
            'minifyJs' => true, // minificate js
            'minifyOutput' => true, // minificate result html page
            'webPath' => '@web', // path alias to web base
            'basePath' => '@webroot', // path alias to web base
            'minifyPath' => '@webroot/minify', // path alias to save minify result
            'jsPosition' => [ \yii\web\View::POS_END ], // positions of js files to be minified
            'forceCharset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expandImports' => true, // whether to change @import on content
            'compressOptions' => ['extra' => true], // options for compress
            //'excludeFiles' => [
            //    'jquery.js', // exclude this file from minification
            //    'app-[^.].js', // you may use regexp
            //],
            //'excludeBundles' => [
            //    \app\helloworld\AssetBundle::class, // exclude this bundle from minification
            //],
        ],*/


    ],
    'sourceLanguage' => 'en',
    'language' => 'en',
    'params' => $params,
];
