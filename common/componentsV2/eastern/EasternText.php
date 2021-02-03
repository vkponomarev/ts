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
class EasternText
{

    /**
     * @var array массив названий картинок животых
     */
    public $pictures;

    /**
     * @var array массив названий животых
     */
    public $names;

    /**
     * @var array Массив названий цветов года
     */
    public $colors;

    /**
     * @var array массив названий элементов года
     */
    public $elements;

    /**
     * @var array массив названий животных года
     */
    public $yearsOf;

    function __construct()
    {
        $this->pictures = $this->pictures();
        $this->names = $this->names();
        $this->colors = $this->colors();
        $this->elements = $this->elements();
        $this->yearsOf = $this->yearsOf();
    }

    function names(){

        $this->names[1] = Yii::t('app', 'Rat');
        $this->names[2] = Yii::t('app', 'Bull');
        $this->names[3] = Yii::t('app', 'Tiger');
        $this->names[4] = Yii::t('app', 'Rabbit');
        $this->names[5] = Yii::t('app', 'Dragon');
        $this->names[6] = Yii::t('app', 'Snake');
        $this->names[7] = Yii::t('app', 'Horse');
        $this->names[8] = Yii::t('app', 'Sheep');
        $this->names[9] = Yii::t('app', 'Monkey');
        $this->names[10] = Yii::t('app', 'Rooster');
        $this->names[11] = Yii::t('app', 'Dog');
        $this->names[12] = Yii::t('app', 'Pig');
        return $this->names;
    }

    function pictures(){

        $this->pictures[1] = 'rat';
        $this->pictures[2] = 'bull';
        $this->pictures[3] = 'tiger';
        $this->pictures[4] = 'rabbit';
        $this->pictures[5] = 'dragon';
        $this->pictures[6] = 'snake';
        $this->pictures[7] = 'horse';
        $this->pictures[8] = 'sheep';
        $this->pictures[9] = 'monkey';
        $this->pictures[10] = 'rooster';
        $this->pictures[11] = 'dog';
        $this->pictures[12] = 'pig';

        return $this->pictures;
    }

    function colors(){

        $this->colors[1] = Yii::t('app', 'white');
        $this->colors[2] = Yii::t('app', 'black');
        $this->colors[3] = Yii::t('app', 'blue-green');
        $this->colors[4] = Yii::t('app', 'red');
        $this->colors[5] = Yii::t('app', 'yellow');

        return $this->colors;
    }


    function elements(){

        $this->elements[1] = Yii::t('app', 'metal');
        $this->elements[2] = Yii::t('app', 'water');
        $this->elements[3] = Yii::t('app', 'wood');
        $this->elements[4] = Yii::t('app', 'fire');
        $this->elements[5] = Yii::t('app', 'earth');

        return $this->elements;
    }

    function yearsOf(){

        $this->yearsOf[1] = Yii::t('app', 'year of the rat');
        $this->yearsOf[2] = Yii::t('app', 'year of the bull');
        $this->yearsOf[3] = Yii::t('app', 'year of the tiger');
        $this->yearsOf[4] = Yii::t('app', 'year of the rabbit');
        $this->yearsOf[5] = Yii::t('app', 'year of the dragon');
        $this->yearsOf[6] = Yii::t('app', 'year of the snake');
        $this->yearsOf[7] = Yii::t('app', 'year of the horse');
        $this->yearsOf[8] = Yii::t('app', 'year of the sheep');
        $this->yearsOf[9] = Yii::t('app', 'year of the monkey');
        $this->yearsOf[10] = Yii::t('app', 'year of the rooster');
        $this->yearsOf[11] = Yii::t('app', 'year of the dog');
        $this->yearsOf[12] = Yii::t('app', 'year of the pig');
        return $this->yearsOf;
    }


}

