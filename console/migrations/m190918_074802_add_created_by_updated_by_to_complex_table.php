<?php

use yii\db\Migration;

/**
 * Class m190918_074802_add_created_by_updated_by_to_complex_table
 */
class m190918_074802_add_created_by_updated_by_to_complex_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%complex}}', 'created_by', $this->integer());
        $this->addColumn('{{%complex}}', 'updated_by', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190918_074802_add_created_by_updated_by_to_complex_table cannot be reverted.\n";

        $this->dropColumn('{{%complex}}', 'created_by');
        $this->dropColumn('{{%complex}}', 'updated_by');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190918_074802_add_created_by_updated_by_to_complex_table cannot be reverted.\n";

        return false;
    }
    */
}
