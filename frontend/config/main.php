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
                    'pattern' => '/holidays/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'holidays/holidays-years/holidays-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/holidays/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'holidays/holidays-months/holidays-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/holidays/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>/<countryURL:[\w_-]+>',
                    'route' => 'holidays/holidays-days/holidays-day-page',
                    'defaults' => ['dayNameURL' => '', 'dayURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/holidays/<holidayNameURL>/<countryURL:[\w_-]+>',
                    'route' => 'holidays/holidays-holiday/holidays-holiday-page',
                    'defaults' => ['holidayNameURL' => '', 'countryURL' => ''],
                ],

                '/holidays/seasons/<seasonURL:(winter|spring|summer|autumn)>/<yearURL:\d{4}>' => 'holidays/holidays-seasons/holidays-season-page',

                [
                    'pattern' => '/calendar/days-off/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-days-off-years/business-days-off-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/days-off/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-days-off-months/business-days-off-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/working/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-working-days-years/business-working-days-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/working/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-working-days-months/business-working-days-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-years/business-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-months/business-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/forty/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-forty-years/business-forty-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/forty/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-forty-months/business-forty-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/thirty/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-thirty-years/business-thirty-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/thirty/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-thirty-months/business-thirty-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/business/six-days/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-six-days-years/business-six-days-year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/six-days/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-six-days-months/business-six-days-month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],


                [
                    'pattern' => '/calendar/business/quarters/<yearURL:\d{4}>/<quarterURL:\d{1}>/<countryURL:[\w_-]+>',
                    'route' => 'business/business-quarters/business-quarter-page',
                    'defaults' => ['yearURL' => '', 'quarterURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/years/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'calendar/years/year-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/seasons/<seasonURL:(winter|spring|summer|autumn)>/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'calendar/seasons/season',
                    'defaults' => ['yearURL' => '', 'seasonURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/months/<monthURL>/<countryURL:[\w_-]+>',
                    'route' => 'calendar/months/month-page',
                    'defaults' => ['monthURL' => '', 'countryURL' => ''],
                ],

                [
                    'pattern' => '/calendar/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>',
                    'route' => 'calendar/days/day-page',
                    'defaults' => ['dayNameURL' => '', 'dayURL' => ''],
                ],

                [
                    'pattern' => '/calendar/religion/<religionURL:[\w_-]+>/years/<yearURL:\d{4}>',
                    'route' => 'religion/religion-years/religion-year-page',
                    'defaults' => ['yearURL' => '', 'religionURL' => ''],
                ],

                [
                    'pattern' => '/calendar/religion/<religionURL:[\w_-]+>/months/<monthURL>',
                    'route' => 'religion/religion-months/religion-month-page',
                    'defaults' => ['monthURL' => '', 'religionURL' => ''],
                ],




                [
                    'pattern' => '/calendar/moon/good/years/<yearURL:\d{4}>/<dayNameURL:[\w_-]+>',
                    'route' => 'moon/moon-years-good/moon-year-good-page',
                    'defaults' => ['dayNameURL' => '', 'yearURL' => ''],
                ],

                [
                    'pattern' => '/calendar/moon/good/months/<monthURL>/<dayNameURL:[\w_-]+>',
                    'route' => 'moon/moon-months-good/moon-month-good-page',
                    'defaults' => ['dayNameURL' => '', 'monthURL' => ''],
                ],

                [
                    'pattern' => '/calendar/moon/gardener/years/<yearURL:\d{4}>/<gardenerNameURL:[\w_-]+>',
                    'route' => 'moon/moon-years-gardener/moon-year-gardener-page',
                    'defaults' => ['gardenerNameURL' => '', 'yearURL' => ''],
                ],

                [
                    'pattern' => '/calendar/moon/gardener/months/<monthURL>/<gardenerNameURL:[\w_-]+>',
                    'route' => 'moon/moon-months-gardener/moon-month-gardener-page',
                    'defaults' => ['gardenerNameURL' => '', 'monthURL' => ''],
                ],


                [
                    'pattern' => '/calendar/moon/phases/years/<yearURL:\d{4}>/<phaseURL:[\w_-]+>',
                    'route' => 'moon/moon-years-phases/moon-year-phase-page',
                    'defaults' => ['phaseURL' => '', 'yearURL' => ''],
                ],

                [
                    'pattern' => '/calendar/moon/phases/months/<monthURL>/<phaseURL:[\w_-]+>',
                    'route' => 'moon/moon-months-phases/moon-month-phase-page',
                    'defaults' => ['phaseURL' => '', 'monthURL' => ''],
                ],

                [
                    'pattern' => '/calendar/moon/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>',
                    'route' => 'moon/moon-days/moon-day-page',
                    'defaults' => ['dayNameURL' => '', 'dayURL' => ''],
                ],

                [
                    'pattern' => '/calendar/moon/phases/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>',
                    'route' => 'moon/moon-days-phases/moon-day-phase-page',
                    'defaults' => ['dayNameURL' => '', 'dayURL' => ''],
                ],

                '/calendar/moon/months/<monthURL>' => 'moon/moon-months/moon-month-page',
                '/calendar/moon/years/<yearURL:\d{4}>' => 'moon/moon-years/moon-year-page',

                '/calendar/moon/phase/months/<monthURL>' => 'moon/moon-months-phase/moon-month-phase-page',
                '/calendar/moon/phase/years/<yearURL:\d{4}>' => 'moon/moon-years-phase/moon-year-phase-page',

                '/calendar/weeks/<yearURL:\d{4}>' => 'calendar/weeks/year-weeks-page',
                '/calendar/weeks/<yearURL:\d{4}>/<weekURL:\d{2}>' => 'calendar/weeks/week-page',

                [
                    'pattern' => '/calendar/weeks/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>',
                    'route' => 'calendar/weeks-days/week-day-page',
                    'defaults' => ['dayNameURL' => '', 'dayURL' => ''],
                ],

                '/calendar/eastern' => 'eastern/eastern/eastern-page',
                '/calendar/eastern/years/<yearURL:\d{4}>' => 'eastern/eastern-years/eastern-year-page',
                '/calendar/eastern/animals/<animalURL:[\w_-]+>' => 'eastern/eastern-animals/eastern-animal-page',

                '/zodiac' => 'zodiac/zodiac/zodiac-page',
                '/zodiac/<signURL:[\w_-]+>' => 'zodiac/zodiac-signs/zodiac-sign-page',
                '/calendar/zodiac/years/<yearURL:\d{4}>' => 'zodiac/zodiac-years/zodiac-year-page',
                '/calendar/zodiac/months/<monthURL>' => 'zodiac/zodiac-months/zodiac-month-page',
                //'/calendar/zodiac/days/<dayURL>' => 'zodiac/zodiac-days/zodiac-day-page',
                [
                    'pattern' => '/calendar/zodiac/days/<dayNameURL:(yesterday|today|tomorrow)>/<dayURL:(\d{4}-\d{2}-\d{2})>',
                    'route' => 'zodiac/zodiac-days/zodiac-day-page',
                    'defaults' => ['dayNameURL' => '', 'dayURL' => ''],
                ],

                /*
                [
                    'pattern' => 'time/<yearURL:\d{4}>/<countryURL:[\w_-]+>',
                    'route' => 'time/time/time-page',
                    'defaults' => ['yearURL' => '', 'countryURL' => ''],
                ],
                */

                //'/calendar' => 'calendar/calendar/calendar-page',


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

                //'/gii/generate-moon-years-pdf/' => 'generate-moon-years/generate-pdf',
                //'/gii/generate-business-years-pdf/' => 'generate-business-years/generate-pdf',
                //'/gii/generate-weeks-pdf/' => 'generate-weeks/generate-pdf',
                //'/gii/generate-years-with-weeks-pdf/' => 'generate-years-with-weeks/generate-pdf',
                //'/gii/generate-months-pdf/' => 'generate-months/generate-pdf',
                //'/gii/generate-seasons-pdf/' => 'generate-seasons/generate-pdf',
                //'/gii/generate-pdf/' => 'generate/generate-pdf',
                //'/print/calendar/' => 'print/print-calendar',
                //'/print/calendar-test/' => 'print/print-calendar-test',
                //CMS

                '/cms/cookie/' => 'cms/cookie-info',
                '/cms/policy/' => 'cms/policy',
                '/cms/user-agreement/' => 'cms/user-agreement',
                '/cms/copyright/' => 'cms/copyright',

                //'/script' => 'scripts/script',

                //'/scripts' => 'scripts/scripts',

                //'/script/translation' => 'scripts/translation',
                //'/script/translation2' => 'scripts/translation2',
                //'/script/translation3' => 'scripts/translation3',
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
