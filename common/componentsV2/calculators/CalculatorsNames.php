<?php

namespace common\componentsV2\calculators;


class CalculatorsNames
{

    public $active;
    public $result;
    public $calculators;
    public $calculatorsNames;
    private $timeOne;
    private $timeTwo;

    function __construct()
    {

        $this->active = 0;
        $this->result = 0;

        $this->calculators = [
            1 => [
                'id' => 1,
                'url' => 'seconds',
                'name' => \Yii::t('app', 'Seconds calculator'),
                'nameText' => \Yii::t('app', 'Seconds'),
                'nameConvertCalcHeader' => \Yii::t('app', 'Convert seconds'),
                'nameConvertCalcSelect' => \Yii::t('appDiff', 'Seconds'),
                'defaultValue' => 1,
                'defaultOpponent' => 2,
                'links' => [
                    2 => [
                        'url' => 'seconds/minutes',
                        'text' => \Yii::t('appDiff', 'seconds to minutes'),
                        'textHowMany' => \Yii::t('appDiff', 'How many seconds in a minute'),
                    ],
                    3 => [
                        'url' => 'seconds/hours',
                        'text' => \Yii::t('appDiff', 'seconds to hours'),
                        'textHowMany' => \Yii::t('appDiff', 'How many seconds in an hour'),
                    ],
                    4 => [
                        'url' => 'seconds/days',
                        'text' => \Yii::t('appDiff', 'seconds to days'),
                        'textHowMany' => \Yii::t('appDiff', 'How many seconds are in the day'),
                    ],
                    5 => [
                        'url' => 'seconds/weeks',
                        'text' => \Yii::t('appDiff', 'seconds to weeks'),
                        'textHowMany' => \Yii::t('appDiff', 'How many seconds in a week'),
                    ],
                    6 => [
                        'url' => 'seconds/months',
                        'text' => \Yii::t('appDiff', 'seconds to months'),
                        'textHowMany' => \Yii::t('appDiff', 'How many seconds in a month'),
                    ],
                    7 => [
                        'url' => 'seconds/years',
                        'text' => \Yii::t('appDiff', 'seconds to years'),
                        'textHowMany' => \Yii::t('appDiff', 'How many seconds in a year'),
                    ],
                ],
            ],
            2 => [
                'id' => 2,
                'url' => 'minutes',
                'name' => \Yii::t('app', 'Minutes calculator'),
                'nameText' => \Yii::t('app', 'Minutes'),
                'nameConvertCalcHeader' => \Yii::t('app', 'Convert minutes'),
                'nameConvertCalcSelect' => \Yii::t('appDiff', 'Minutes'),
                'defaultValue' => 1,
                'defaultOpponent' => 1,
                'links' => [
                    1 => [
                        'url' => 'minutes/seconds',
                        'text' => \Yii::t('appDiff', 'minutes to seconds'),
                        'textHowMany' => \Yii::t('appDiff', 'How many minutes in a second'),
                    ],

                    3 => [
                        'url' => 'minutes/hours',
                        'text' => \Yii::t('appDiff', 'minutes to hours'),
                        'textHowMany' => \Yii::t('appDiff', 'How many minutes in an hour'),
                    ],
                    4 => [
                        'url' => 'minutes/days',
                        'text' => \Yii::t('appDiff', 'minutes to days'),
                        'textHowMany' => \Yii::t('appDiff', 'How many minutes are in the day'),
                    ],
                    5 => [
                        'url' => 'minutes/weeks',
                        'text' => \Yii::t('appDiff', 'minutes to weeks'),
                        'textHowMany' => \Yii::t('appDiff', 'How many minutes in a week'),
                    ],
                    6 => [
                        'url' => 'minutes/months',
                        'text' => \Yii::t('appDiff', 'minutes to months'),
                        'textHowMany' => \Yii::t('appDiff', 'How many minutes in a month'),
                    ],
                    7 => [
                        'url' => 'minutes/years',
                        'text' => \Yii::t('appDiff', 'minutes to years'),
                        'textHowMany' => \Yii::t('appDiff', 'How many minutes in a year'),
                    ],
                ],
            ],
            3 => [
                'id' => 3,
                'url' => 'hours',
                'name' => \Yii::t('app', 'Hours calculator'),
                'nameText' => \Yii::t('app', 'Hours'),
                'nameConvertCalcHeader' => \Yii::t('app', 'Convert hours'),
                'nameConvertCalcSelect' => \Yii::t('appDiff', 'Hours'),
                'defaultValue' => 1,
                'defaultOpponent' => 1,
                'links' => [
                    1 => [
                        'url' => 'hours/seconds',
                        'text' => \Yii::t('appDiff', 'hours to seconds'),
                        'textHowMany' => \Yii::t('appDiff', 'How many hours in a second'),
                    ],
                    2 => [
                        'url' => 'hours/minutes',
                        'text' => \Yii::t('appDiff', 'hours to minutes'),
                        'textHowMany' => \Yii::t('appDiff', 'How many hours in a minute'),
                    ],

                    4 => [
                        'url' => 'hours/days',
                        'text' => \Yii::t('appDiff', 'hours to days'),
                        'textHowMany' => \Yii::t('appDiff', 'How many hours are in the day'),
                    ],
                    5 => [
                        'url' => 'hours/weeks',
                        'text' => \Yii::t('appDiff', 'hours to weeks'),
                        'textHowMany' => \Yii::t('appDiff', 'How many hours in a week'),
                    ],
                    6 => [
                        'url' => 'hours/months',
                        'text' => \Yii::t('appDiff', 'hours to months'),
                        'textHowMany' => \Yii::t('appDiff', 'How many hours in a month'),
                    ],
                    7 => [
                        'url' => 'hours/years',
                        'text' => \Yii::t('appDiff', 'hours to years'),
                        'textHowMany' => \Yii::t('appDiff', 'How many hours in a year'),
                    ],
                ],
            ],
            4 => [
                'id' => 4,
                'url' => 'days',
                'name' => \Yii::t('app', 'Days calculator'),
                'nameText' => \Yii::t('app', 'Days'),
                'nameConvertCalcHeader' => \Yii::t('app', 'Convert days'),
                'nameConvertCalcSelect' => \Yii::t('appDiff', 'Days'),
                'defaultValue' => 1,
                'defaultOpponent' => 1,
                'links' => [
                    1 => [
                        'url' => 'days/seconds',
                        'text' => \Yii::t('appDiff', 'days to seconds'),
                        'textHowMany' => \Yii::t('appDiff', 'How many days in a second'),
                    ],
                    2 => [
                        'url' => 'days/minutes',
                        'text' => \Yii::t('appDiff', 'days to minutes'),
                        'textHowMany' => \Yii::t('appDiff', 'How many days in a minute'),
                    ],
                    3 => [
                        'url' => 'days/hours',
                        'text' => \Yii::t('appDiff', 'days to hours'),
                        'textHowMany' => \Yii::t('appDiff', 'How many days in an hour'),
                    ],

                    5 => [
                        'url' => 'days/weeks',
                        'text' => \Yii::t('appDiff', 'days to weeks'),
                        'textHowMany' => \Yii::t('appDiff', 'How many days in a week'),
                    ],
                    6 => [
                        'url' => 'days/months',
                        'text' => \Yii::t('appDiff', 'days to months'),
                        'textHowMany' => \Yii::t('appDiff', 'How many days in a month'),
                    ],
                    7 => [
                        'url' => 'days/years',
                        'text' => \Yii::t('appDiff', 'days to years'),
                        'textHowMany' => \Yii::t('appDiff', 'How many days in a year'),
                    ],
                ],
            ],
            5 => [
                'id' => 5,
                'url' => 'weeks',
                'name' => \Yii::t('app', 'Weeks calculator'),
                'nameText' => \Yii::t('app', 'Weeks'),
                'nameConvertCalcHeader' => \Yii::t('app', 'Convert weeks'),
                'nameConvertCalcSelect' => \Yii::t('appDiff', 'Weeks'),
                'defaultValue' => 1,
                'defaultOpponent' => 1,
                'links' => [
                    1 => [
                        'url' => 'weeks/seconds',
                        'text' => \Yii::t('appDiff', 'weeks to seconds'),
                        'textHowMany' => \Yii::t('appDiff', 'How many weeks in a second'),
                    ],
                    2 => [
                        'url' => 'weeks/minutes',
                        'text' => \Yii::t('appDiff', 'weeks to minutes'),
                        'textHowMany' => \Yii::t('appDiff', 'How many weeks in a minute'),
                    ],
                    3 => [
                        'url' => 'weeks/hours',
                        'text' => \Yii::t('appDiff', 'weeks to hours'),
                        'textHowMany' => \Yii::t('appDiff', 'How many weeks in an hour'),
                    ],
                    4 => [
                        'url' => 'weeks/days',
                        'text' => \Yii::t('appDiff', 'weeks to days'),
                        'textHowMany' => \Yii::t('appDiff', 'How many weeks are in the day'),
                    ],

                    6 => [
                        'url' => 'weeks/months',
                        'text' => \Yii::t('appDiff', 'weeks to months'),
                        'textHowMany' => \Yii::t('appDiff', 'How many weeks in a month'),
                    ],
                    7 => [
                        'url' => 'weeks/years',
                        'text' => \Yii::t('appDiff', 'weeks to years'),
                        'textHowMany' => \Yii::t('appDiff', 'How many weeks in a year'),
                    ],
                ],
            ],
            6 => [
                'id' => 6,
                'url' => 'months',
                'name' => \Yii::t('app', 'Months calculator'),
                'nameText' => \Yii::t('app', 'Months'),
                'nameConvertCalcHeader' => \Yii::t('app', 'Convert months'),
                'nameConvertCalcSelect' => \Yii::t('appDiff', 'Months'),
                'defaultValue' => 1,
                'defaultOpponent' => 1,
                'links' => [
                    1 => [
                        'url' => 'months/seconds',
                        'text' => \Yii::t('appDiff', 'months to seconds'),
                        'textHowMany' => \Yii::t('appDiff', 'How many months in a second'),
                    ],
                    2 => [
                        'url' => 'months/minutes',
                        'text' => \Yii::t('appDiff', 'months to minutes'),
                        'textHowMany' => \Yii::t('appDiff', 'How many months in a minute'),
                    ],
                    3 => [
                        'url' => 'months/hours',
                        'text' => \Yii::t('appDiff', 'months to hours'),
                        'textHowMany' => \Yii::t('appDiff', 'How many months in an hour'),
                    ],
                    4 => [
                        'url' => 'months/days',
                        'text' => \Yii::t('appDiff', 'months to days'),
                        'textHowMany' => \Yii::t('appDiff', 'How many months are in the day'),
                    ],
                    5 => [
                        'url' => 'months/weeks',
                        'text' => \Yii::t('appDiff', 'months to weeks'),
                        'textHowMany' => \Yii::t('appDiff', 'How many months in a week'),
                    ],

                    7 => [
                        'url' => 'months/years',
                        'text' => \Yii::t('appDiff', 'months to years'),
                        'textHowMany' => \Yii::t('appDiff', 'How many months in a year'),
                    ],
                ],
            ],
            7 => [
                'id' => 7,
                'url' => 'years',
                'name' => \Yii::t('app', 'Years calculator'),
                'nameText' => \Yii::t('app', 'Years'),
                'nameConvertCalcHeader' => \Yii::t('app', 'Convert years'),
                'nameConvertCalcSelect' => \Yii::t('appDiff', 'Years'),
                'defaultValue' => 1,
                'defaultOpponent' => 1,
                'links' => [
                    1 => [
                        'url' => 'years/seconds',
                        'text' => \Yii::t('appDiff', 'years to seconds'),
                        'textHowMany' => \Yii::t('appDiff', 'How many years in a second'),
                    ],
                    2 => [
                        'url' => 'years/minutes',
                        'text' => \Yii::t('appDiff', 'years to minutes'),
                        'textHowMany' => \Yii::t('appDiff', 'How many years in a minute'),
                    ],
                    3 => [
                        'url' => 'years/hours',
                        'text' => \Yii::t('appDiff', 'years to hours'),
                        'textHowMany' => \Yii::t('appDiff', 'How many years in an hour'),
                    ],
                    4 => [
                        'url' => 'years/days',
                        'text' => \Yii::t('appDiff', 'years to days'),
                        'textHowMany' => \Yii::t('appDiff', 'How many years are in the day'),
                    ],
                    5 => [
                        'url' => 'years/weeks',
                        'text' => \Yii::t('appDiff', 'years to weeks'),
                        'textHowMany' => \Yii::t('appDiff', 'How many years in a week'),
                    ],
                    6 => [
                        'url' => 'years/months',
                        'text' => \Yii::t('appDiff', 'years to months'),
                        'textHowMany' => \Yii::t('appDiff', 'How many years in a month'),
                    ],

                ],
            ],

        ];
        /*
                $this->calculators = [
                    1 => [
                        'url' => 'seconds',
                        'name' => \Yii::t('app', 'Seconds calculator'),
                    ],
                    2 => 'minutes',
                    3 => 'hours',
                    4 => 'days',
                    5 => 'weeks',
                    6 => 'months',
                    7 => 'years',
                ];

                $this->calculatorsNames = [
                    1 => ,
                    2 => \Yii::t('app', 'Minutes calculator'),
                    3 => \Yii::t('app', 'Hours calculator'),
                    4 => \Yii::t('app', 'Days calculator'),
                    5 => \Yii::t('app', 'Weeks calculator'),
                    6 => \Yii::t('app', 'Months calculator'),
                    7 => \Yii::t('app', 'Years calculator'),
                ];*/


    }

}

