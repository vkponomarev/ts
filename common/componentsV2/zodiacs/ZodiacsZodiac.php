<?php

namespace common\componentsV2\zodiacs;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Все данные одного зодиака например Овна.
 * Class ZodiacsZodiac
 * @package common\componentsV2\zodiacs
 */
class ZodiacsZodiac
{

    public $id;

    /**
     * @var string Название зодиака с Заглавной буквы
     */
    public $nameCapital;
    /**
     * @var string Название зодиака
     */
    public $name;
    /**
     * @var string название картинки зодиака
     */
    public $picture;
    /**
     * @var array [start] [end] массив дат начало и конец зодиака
     */
    public $range;

    /**
     * @var array Планеты зодиака
     */
    public $planets;

    /**
     * @var array Стихии зодиака
     */
    public $elements;

    /**
     * @var array Камни зодиака
     */
    public $stones;

    /**
     * @var array Талисманы зодиака
     */
    public $mascots;

    /**
     * @var array Цвета зодиака
     */
    public $colors;


    /**
     * ZodiacsZodiac constructor.
     * @param $sign
     * @param $ranges array
     * @param $has \common\componentsV2\zodiacs\ZodiacsHas
     * @param $texts \common\componentsV2\zodiacs\ZodiacsTexts
     * @param $urls \common\componentsV2\zodiacs\ZodiacsUrls
     * @param $pictures
     */
    function __construct($sign, $texts, $urls, $pictures, $ranges, $has)
    {
        $this->id = $urls->keys[$sign];
        $this->nameCapital = $texts->namesCapital[$this->id];
        $this->name = $texts->names[$this->id];
        $this->picture = $pictures[$this->id];
        $this->range = $ranges[$this->id];
        $this->planets = $has->planets[$this->id];
        $this->elements = $has->elements[$this->id];
        $this->stones = $has->stones[$this->id];
        $this->mascots = $has->mascots[$this->id];
        $this->colors = $has->colors[$this->id];
    }

}

