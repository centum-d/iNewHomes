<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>

<div class="complex-index">
    <div class="card">
        <div class="card-header clearfix">
            <h3 class="card-title pull-left mt-0">
                <?= Yii::t('app', 'Complex List') ?>
            </h3>

            <div class="pull-right">
                <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                    'title' => Yii::t('app', 'Create'),
                    'class' => 'btn btn-success'
                ]); ?>
            </div>
        </div>

        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn'
                    ],
                    'complex_id',
                    'name',
                    'address',
                    [
                        'attribute' => 'createdBy',
                        'value' => function ($data) {
                            return $data->createdBy->username ?? null;
                        }
                    ],
                    [
                        'attribute' => 'updatedBy',
                        'value' => function ($data) {
                            return $data->updatedBy->username ?? null;
                        }
                    ],
                    'created_at',
                    'updated_at',
                    [
                        'class' => 'yii\grid\ActionColumn',
                    ]
                ],
            ]); ?>
        </div>
    </div>
</div>

