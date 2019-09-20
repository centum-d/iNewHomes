<?php

namespace rest\versions\v1\controllers;

use common\models\complex\Complex;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\web\Response;

/**
 * Class ComplexController
 * @package rest\versions\v1\controllers
 */
class ComplexController extends \yii\rest\Controller
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
                'class' => 'rest\versions\v1\actions\IndexAction',
                'modelClass' => Complex::class,
            ],
            'view' => [
                'class' => 'tuyakhov\jsonapi\actions\ViewAction',
                'modelClass' => Complex::class,
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}
