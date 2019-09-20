<?php

namespace common\behaviors\softdelete;

use yii\db\ActiveRecord;

/**
 * Class SoftDeleteBehavior
 */
class SoftDeleteBehavior extends \yii\base\Behavior
{
    public $attribute = 'is_deleted';

    public $value = 1;

    /**
     * @return mixed
     * @throws \Throwable
     */
    public function softDelete()
    {
        $softDeleteCallback = function () {
            $attribute = $this->attribute;

            $this->owner->$attribute = $this->value;

            $this->owner->save(false, [$attribute]);
        };

        if (!$this->owner->isTransactional(ActiveRecord::OP_DELETE) && !$this->owner->isTransactional(ActiveRecord::OP_UPDATE)) {
            return call_user_func($softDeleteCallback);
        }

        $transaction = $this->owner->getDb()->beginTransaction;

        try {
            $result = call_user_func($softDeleteCallback);

            if ($result === false) {
                $transaction->rollBack();
            } else {
                $transaction->commit();
            }

            return $result;

        } catch (\Exception $exception) {

        } catch (\Throwable $exception) {

        }

        $transaction->rollBack();

        throw $exception;
    }
}