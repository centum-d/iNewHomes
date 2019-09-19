<?php

namespace frontend\controllers;

use common\models\City;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\web\Response;

/**
 * Class CityController
 * @package frontend\controllers
 */
class CityController extends \yii\rest\Controller
{
    public $serializer = 'tuyakhov\jsonapi\Serializer';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/vnd.api+json' => Response::FORMAT_JSON,
                ],
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => 'tuyakhov\jsonapi\actions\IndexAction',
                'modelClass' => City::class,
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}
