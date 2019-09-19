<?php

namespace frontend\controllers;

use common\models\complex\Complex;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\web\Response;


/**
 * Class ComplexController
 * @package frontend\controllers
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
                'class' => 'frontend\actions\IndexAction',
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
