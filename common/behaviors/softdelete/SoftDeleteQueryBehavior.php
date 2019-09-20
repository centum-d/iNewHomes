<?php

namespace common\behaviors\softdelete;

/**
 * Class SoftDeleteQueryBehavior
 */
class SoftDeleteQueryBehavior extends \yii\base\Behavior
{
    public function isDeleted()
    {
        $this->owner->andWhere(['is_deleted' => 1]);

        return $this->owner;
    }

    public function notDeleted()
    {
        $this->owner->andWhere(['is_deleted' => 0]);

        return $this->owner;
    }
}