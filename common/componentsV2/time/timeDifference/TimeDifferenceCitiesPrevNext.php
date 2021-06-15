<?php

namespace common\componentsV2\time\timeDifference;

class TimeDifferenceCitiesPrevNext
{

    public $previous;
    public $next;


    public function __construct($location)
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
            ', [':cityID' => $location->city->id])
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
            ', [':cityID' => $location->city->id])
            ->queryOne();

    }
}
