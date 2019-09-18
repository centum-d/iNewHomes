<?php

use yii\db\Migration;

/**
 * Class m190916_184541_create_city_entity
 */
class m190916_184541_create_city_entity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'city_id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->execute('ALTER TABLE city ADD COLUMN geom geometry(MultiPolygon,4326)');

        $sql = file_get_contents(__DIR__ . '/../city.sql');
        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190916_184541_create_city_entity cannot be reverted.\n";

        return false;
    }
    */
}
