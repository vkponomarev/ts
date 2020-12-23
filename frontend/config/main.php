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
            'name' => 'flowlez',
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
            'languages' => ['en','ru','es','pt','ja','de','ko','fr','jv','vi','it','tr','uk','th','pl','az','ro','uz','hu','el','cs','zh','hi','bn'],
            'enableDefaultLanguageUrlCode' => true,
            'rules' => [
                '/' => 'main-page/index',
                '/calendar/customize/' => 'customize/customize-page',

                '/calendar/years/<url>' => 'years/year-page',
                '/calendar/months/<urlMonth>' => 'months/month-page',
                '/calendar/days/<urlDay>' => 'days/day-page',

                '/calendar/seasons/winter/<urlYear>' => 'seasons/winter',
                '/calendar/seasons/spring/<urlYear>' => 'seasons/spring',
                '/calendar/seasons/summer/<urlYear>' => 'seasons/summer',
                '/calendar/seasons/autumn/<urlYear>' => 'seasons/autumn',




                /*'/seasons/winter/<urlYear>' => 'years/winter',
                '/seasons/spring/<urlYear>' => 'years/spring',
                '/seasons/summer/<urlYear>' => 'years/summer',
                '/seasons/autumn/<urlYear>' => 'years/autumn',*/

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
