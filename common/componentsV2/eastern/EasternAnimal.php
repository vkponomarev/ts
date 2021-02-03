<?php

namespace common\componentsV2\eastern;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * 1- Крыса
 * 2- Бык
 * 3- Тигр
 * 4- Кролик
 * 5- Дракон
 * 6- Змея
 * 7- Лошадь
 * 8- Овца
 * 9- Обезьяна
 * 10- Петух
 * 11- Собака
 * 12- Свинья
 *
 */
class EasternAnimal
{
    public $id;

    public $yearOf;

    public $yearOfCapital;

    public $name;

    public $picture;

    /**
     * EasternAnimal constructor.
     * @param $animal
     * @param $yearsOf
     * @param $yearsOfCapital
     * @param $animalsUrls
     * @param $animalsNames
     * @param $animalsPictures
     */
    function __construct($animal, $yearsOf, $yearsOfCapital, $animalsUrls, $animalsNames, $animalsPictures)
    {
        $this->id = $animalsUrls[$animal];
        $this->yearOf = $yearsOf[$this->id];
        $this->yearOfCapital = $yearsOfCapital[$this->id];
        $this->name = $animalsNames[$this->id];
        $this->picture = $animalsPictures[$this->id];

    }





}

