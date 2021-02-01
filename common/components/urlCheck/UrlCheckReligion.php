<?php

namespace common\components\urlCheck;


use common\components\moon\Moon;
use yii\web\NotFoundHttpException;


class UrlCheckReligion
{


    function year($religion)
    {

        $religions = ['orthodox', 'catholic', 'muslim', 'jewish', 'hindu'];


        if (($religion == '') or
            ($religion == '') or
            ($religion == '') or
            ($religion == '') or
            ($religion == '') or
            ($religion == '')
        )

        if ($religion <> ''){

            $key = array_search($religion, $religions);

            if (false !== $key)
            {

            } else {

                throw new NotFoundHttpException('404');

            }

        } else {

            throw new NotFoundHttpException('404');

        }

    }

}
