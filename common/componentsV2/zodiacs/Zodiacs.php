<?php

namespace common\componentsV2\zodiacs;

use common\componentsV2\zodiacs\ZodiacsZodiacs;


class Zodiacs
{

    /**
     * @var
     */
    public $pictures;
    /**
     * @var \common\componentsV2\zodiacs\ZodiacsZodiac
     */
    public $zodiac;

    /**
     * @var
     */
    public $ranges;
    /**
     * @var \common\componentsV2\zodiacs\ZodiacsUrls
     */
    public $urls;

    /**
     * @var \common\componentsV2\zodiacs\ZodiacsTexts
     */
    public $texts;

    /**
     * @var \common\componentsV2\zodiacs\ZodiacsHas
     */
    public $has;


    function __construct()
    {
        $this->urls();
        $this->pictures();
        $this->texts();
        $this->ranges();
        $this->has();
    }

    private function urls()
    {
        $this->urls = (new ZodiacsUrls());
        return $this;
    }

    private function pictures()
    {
        $this->pictures = (new ZodiacsPictures())->pictures();
        return $this;
    }

    private function texts()
    {
        $this->texts = (new ZodiacsTexts());
        return $this;
    }

    private function ranges()
    {
        $this->ranges = (new ZodiacsRanges())->ranges();
        return $this;
    }

    private function has()
    {
        $this->has = (new ZodiacsHas());
        return $this;
    }

    function zodiac($sign)
    {
        $this->zodiac = new ZodiacsZodiac(
            $sign,
            $this->texts,
            $this->urls,
            $this->pictures,
            $this->ranges,
            $this->has
        );
        return $this;
    }

}

