<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="complex-form">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <div class="card">
        <div class="card-header clearfix">
            <h3 class="card-title pull-left mt-0">
                <?= $model->name; ?>
            </h3>

            <div class="cart-tools pull-right">
                <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                    'title' => Yii::t('app', 'Create'),
                    'class' => 'btn btn-success'
                ]); ?>

                <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i>', [
                    'title' => Yii::t('app', 'Save'),
                    'class' => 'btn btn-primary',
                ]); ?>

                <?php if (!$model->isNewRecord) : ?>
                    <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->complex_id], [
                        'title' => Yii::t('app', 'Delete'),
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="card-body">
            <?= $form->field($model, 'name')->textInput([
                'maxlength' => 255
            ]); ?>

            <?= $form->field($model, 'address')->textInput([
                'maxlength' => 255
            ]); ?>
        </div>

        <div class="card-footer">
            <div class="text-right">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), [
                    'class' => 'btn btn-primary'
                ]); ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
</div>