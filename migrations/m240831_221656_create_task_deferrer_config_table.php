<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_deferrer_config}}`.
 */
class m240831_221656_create_task_deferrer_config_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task_deferrer_config}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(255)->notNull()->unique(),
            'value' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task_deferrer_config}}');
    }
}
