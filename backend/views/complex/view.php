<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="complex-index">
    <div class="card">
        <div class="card-header clearfix">
            <h3 class="card-title pull-left mt-0">
                <?= $model->name; ?>
            </h3>

            <div class="pull-right">
                <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                    'title' => Yii::t('app', 'Create'),
                    'class' => 'btn btn-success'
                ]); ?>

                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->complex_id], [
                    'title' => Yii::t('app', 'Update'),
                    'class' => 'btn btn-primary'
                ]); ?>

                <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->complex_id], [
                    'title' => Yii::t('app', 'Delete'),
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]); ?>
            </div>
        </div>

        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'complex_id',
                    'name',
                    'address',
                    [
                        'attribute' => 'created_by',
                        'value' => $model->createdBy->username ?? null
                    ],
                    [
                        'attribute' => 'updated_by',
                        'value' => $model->updatedBy->username ?? null
                    ],
                    'created_at',
                    'updated_at',
                ],
            ]); ?>
        </div>
    </div>
</div>
