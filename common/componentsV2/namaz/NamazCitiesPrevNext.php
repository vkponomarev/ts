<?php

namespace common\componentsV2\namaz;

class NamazCitiesPrevNext
{

    public $previous;
    public $next;

    public function __construct($city)
    {

        $this->next = \Yii::$app->db
            ->createCommand('
            select
            tc.id,  
            tc.url,
            tc.name
            from
            time_cities as tc
            where
            tc.id > :cityID
            ORDER BY tc.id LIMIT 1;            
            ', [':cityID' => $city->id])
            ->queryOne();

        $this->previous = \Yii::$app->db
            ->createCommand('
            select
            tc.id,  
            tc.url,
            tc.name
            from
            time_cities as tc
            where
            tc.id < :cityID ORDER BY tc.id DESC LIMIT 1;
            ORDER BY tc.id LIMIT 1;            
            ', [':cityID' => $city->id])
            ->queryOne();
    }
}
