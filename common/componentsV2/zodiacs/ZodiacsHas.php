<?php

namespace common\componentsV2\zodiacs;


class ZodiacsHas
{

    public $planets;
    public $elements;
    public $stones;
    public $mascots;
    public $colors;

    function __construct()
    {
        $this->planets = $this->planets();
        $this->elements = $this->elements();
        $this->stones = $this->stones();
        $this->mascots = $this->mascots();
        $this->colors = $this->colors();
    }

    private function planets()
    {
        $planets[1] = [5];
        $planets[2] = [3];
        $planets[3] = [2];
        $planets[4] = [11];
        $planets[5] = [1];
        $planets[6] = [2];
        $planets[7] = [3];
        $planets[8] = [5,10];
        $planets[9] = [6];
        $planets[10] = [7];
        $planets[11] = [7,8];
        $planets[12] = [6,9];
        return $planets;
    }

    private function elements()
    {
        $elements[1] = [3];
        $elements[2] = [2];
        $elements[3] = [4];
        $elements[4] = [1];
        $elements[5] = [3];
        $elements[6] = [2];
        $elements[7] = [4];
        $elements[8] = [1];
        $elements[9] = [3];
        $elements[10] = [2];
        $elements[11] = [4];
        $elements[12] = [1];
        return $elements;
    }

    private function stones()
    {
        $stones[1] = [1,2];
        $stones[2] = [3,4];
        $stones[3] = [5,6];
        $stones[4] = [7,8];
        $stones[5] = [9,10];
        $stones[6] = [11,12];
        $stones[7] = [13,14];
        $stones[8] = [15,16];
        $stones[9] = [17,18];
        $stones[10] = [19,20];
        $stones[11] = [21,22];
        $stones[12] = [23,24];
        return $stones;
    }


    private function mascots()
    {
        $mascots[1] = [1,2];
        $mascots[2] = [3,4];
        $mascots[3] = [5,6];
        $mascots[4] = [15,7];
        $mascots[5] = [9,10,11];
        $mascots[6] = [12,13];
        $mascots[7] = [14,15];
        $mascots[8] = [17,18];
        $mascots[9] = [19,20];
        $mascots[10] = [21];
        $mascots[11] = [22,23];
        $mascots[12] = [24,25];
        return $mascots;
    }

    private function colors()
    {
        $colors[1] = [1,2,3];
        $colors[2] = [4,5];
        $colors[3] = [5,7];
        $colors[4] = [8,9];
        $colors[5] = [10,11,7];
        $colors[6] = [12,6];
        $colors[7] = [13];
        $colors[8] = [14,8,4];
        $colors[9] = [15];
        $colors[10] = [16,17,18,19];
        $colors[11] = [20,12];
        $colors[12] = [21,8];
        return $colors;
    }

}

