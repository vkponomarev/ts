<?php

namespace common\components\translations;


use Stichoza\GoogleTranslate\GoogleTranslate;
use Yii;


class TranslationsAddOneFieldDo
{

    private $text;
    private $languages;

    function __construct($tableName, $fieldNameMain, $data, $languages, $limitStart)
    {
        $this->translate($tableName, $fieldNameMain,$data, $languages, $limitStart);
    }

    function translate($tableName, $fieldNameMain, $data, $languages, $limitStart)
    {
        /*(new \common\components\dump\Dump())->printR($tableName);
        (new \common\components\dump\Dump())->printR($data);
        (new \common\components\dump\Dump())->printR($languages);
        (new \common\components\dump\Dump())->printR($limitStart);
        die;*/

        set_time_limit(5000000);
        ini_set("memory_limit", "2000M");

        $bigData = new \common\components\bigData\BigData();

        $count = $limitStart;
        foreach ($data as $items) {
            $count++;
            // Сохраняем прогресс обработки данных для того чтобы было понятно на какой страдии мы сейчас находимся
            $bigData->saveData($count, $tableName);
            /*$items['name'] = str_replace('"', '', $items['name']);
            $items['name_in'] = str_replace('"', '', $items['name_in']);
            $items['name_for'] = str_replace('"', '', $items['name_for']);

            $items['name'] = str_replace("'", "", $items['name']);
            $items['name_in'] = str_replace("'", "", $items['name_in']);
            $items['name_for'] = str_replace("'", "", $items['name_for']);*/
            foreach ($languages as $language) {
                if ($language['id'] == 2) {
                    continue;
                }

                //(new \common\components\dump\Dump())->printR($language);die;
                // 1. Провреяем есть ли запись с такими данными или еще нет
                $data2 = $this->checkExists($tableName, $language, $items);



                if ($data2) {
                    //2. Если мы нашли данные то нужно проверить все ли поля были переведены и перевести если нет.
                    $fieldNames = [$fieldNameMain];
                    foreach ($fieldNames as $fieldName) {
                        $data3 = $this->checkExistsField($tableName, $fieldName, $language, $items);
                        if ($data3){
                            //3. Перевести
                            $translation = $this->doTranslate($language['url'], $items[$fieldName]);
                            //4. Обновить запись
                            $this->update($tableName, $fieldName, $language, $items, $translation);
                        }
                    }



                } else {
                    // Если мы не нешли такую запись то ее нужно создать
                    $countTranslations = 0;
                    // Переводим все данные
                    $translation2[$fieldNameMain] = $this->doTranslate($language['url'], $items['name']);
                    // Сохраняем все переведенные данные.
                    $this->insert($tableName, $fieldNameMain, $translation2, $language, $items);
                }


            }

        }

    }

    function checkExists($tableName, $language, $item){

        $data = Yii::$app->db
            ->createCommand('
            SELECT
            *
            FROM ' . $tableName . '_text
            where
            ' . $tableName . '_text.languages_id = ' . $language['id'] . '
            and
            ' . $tableName . '_text.' . $tableName . '_id = ' . $item['id'] . '
            ')
            ->queryAll();
        return $data;
    }

    function checkExistsField($tableName, $fieldName, $language, $item){

        $data = Yii::$app->db
            ->createCommand('
            SELECT
            *
            FROM ' . $tableName . '_text
            where
            ' . $tableName . '_text.languages_id = ' . $language['id'] . '
            and
            ' . $tableName . '_text.' . $tableName . '_id = ' . $item['id'] . '
            and
            ' . $tableName . '_text.' . $fieldName . ' = ""
            ')
            ->queryAll();

        return $data;
    }

    function update($tableName, $fieldName, $language, $item, $translation){

        Yii::$app->db
            ->createCommand('
            update 
            ' . $tableName . '_text
            set
            ' . $fieldName . ' = \'' . addslashes($translation) . ' \'
            where
            ' . $tableName . '_id = ' . $item['id'] . '
            and
            languages_id = ' . $language['id'] . '
            ')
            ->execute();

    }

    function insert($tableName, $fieldNameMain, $translation, $language, $item)
    {

        Yii::$app->db
            ->createCommand('
            insert into 
            ' . $tableName . '_text
            (' . $fieldNameMain . ', ' . $tableName . '_id, languages_id)
            values
            ("' . addslashes($translation[$fieldNameMain]) . '", '. $item['id'] . ', '. $language['id'] . ')
            ')
            ->execute();

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
            /*$translationText = str_replace('"', '', $translationText);
            $translationText = str_replace("'", "", $translationText);*/
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
