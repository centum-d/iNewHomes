<?php

namespace common\models\complex;

use common\behaviors\softdelete\SoftDeleteQueryBehavior;

/**
 * Class ComplexQuery
 * @package common\models\complex
 */
class ComplexQuery extends \yii\db\ActiveQuery
{
    public function behaviors()
    {
        return [
            'softDelete' => [
                'class' => SoftDeleteQueryBehavior::class,
            ]
        ];
    }
}