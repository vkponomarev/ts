<?php

namespace common\components\url;


use Yii;


class UrlMakeUrlUpdate
{

    function __construct($tableName, $fieldName, $data )
    {

        $this->update($tableName, $fieldName, $data);

    }

    function update($tableName, $fieldName, $data)
    {

        foreach ($data as $item) {

            Yii::$app->db
                ->createCommand('
            update 
            ' . $tableName . '
            set
            url = \'' . $this->urlTransliteration($item[$fieldName]) . '-' . $item['id'] . '\'
            where
            id = ' . $item['id'] . '
            
            ')
                ->execute();
        }

    }


    function urlTransliteration($url){

        $UrlTransliterated = preg_replace("/-/"," ",$url);
        $UrlTransliterated = transliterator_transliterate("Any-Latin; Latin-ASCII; [\\u0100-\\u7fff] remove ; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();", $UrlTransliterated);
        $UrlTransliterated = preg_replace('/[^\\pL\\d._]+/u', '-', $UrlTransliterated);
        //echo $UrlTransliterated . "<br>";

        return $UrlTransliterated;

    }

}
