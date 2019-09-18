<?php

use yii\db\Migration;

/**
 * Class m190916_175329_create_complex_entity
 */
class m190916_175329_create_complex_entity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%complex}}', [
            'complex_id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
        ]);

        $this->execute('ALTER TABLE complex ADD COLUMN geom geometry(Point,4326)');

        $sql = file_get_contents(__DIR__ . '/../complex.sql');
        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%complex}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190916_175329_create_complex_entity cannot be reverted.\n";

        return false;
    }
    */
}
