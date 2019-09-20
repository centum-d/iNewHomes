<?php

use yii\db\Migration;

/**
 * Class m190920_115018_add_is_deleted_to_complex_table
 */
class m190920_115018_add_is_deleted_to_complex_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%complex}}', 'is_deleted', $this->tinyInteger(1)->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190920_115018_add_is_deleted_to_complex_table cannot be reverted.\n";

        $this->dropColumn('{{%complex}}', 'is_deleted');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190920_115018_add_is_deleted_to_complex_table cannot be reverted.\n";

        return false;
    }
    */
}
