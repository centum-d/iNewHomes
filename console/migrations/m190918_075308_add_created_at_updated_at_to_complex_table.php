<?php

use yii\db\Migration;

/**
 * Class m190918_075308_add_created_at_updated_at_to_complex_table
 */
class m190918_075308_add_created_at_updated_at_to_complex_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%complex}}', 'created_at', $this->timestamp());
        $this->addColumn('{{%complex}}', 'updated_at', $this->timestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190918_075308_add_created_at_updated_at_to_complex_table cannot be reverted.\n";

        $this->dropColumn('{{%complex}}', 'created_at');
        $this->dropColumn('{{%complex}}', 'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190918_075308_add_created_at_updated_at_to_complex_table cannot be reverted.\n";

        return false;
    }
    */
}
