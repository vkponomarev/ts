<?php

namespace common\components\translations;


use Yii;
use yii\web\NotFoundHttpException;
use Stichoza\GoogleTranslate\GoogleTranslate;



class TranslationsAddAllDoTranslate
{

    private $text;


    function __construct($languageUrl, $itemName)
    {

        $this->text = $this->doTranslate($languageUrl, $itemName);

    }

    function doTranslate($languageUrl, $itemName)
    {

        sleep(1);

        try {

            $tr = new GoogleTranslate($languageUrl, null, [
                'timeout' => 2000,
            ]);

            $tr->setTarget($languageUrl);

            $translationText = $tr->translate($itemName);

            //echo '$translationText' . $translationText . '<br>';

            $translationTextLanguage = $tr->getLastDetectedSource();

            return $translationText;


        } //Перехватываем (catch) исключение, если что-то идет не так.
        catch (Exception $ex) {
            //Выводим сообщение об исключении.

            echo $ex->getMessage() . '<br>';
            $bigData = new \common\components\bigData\BigData();
            $bigData->saveData('10', 'exception');
            $bigData->saveException(1, $ex->getMessage());
            return null;

        }

    }

}
