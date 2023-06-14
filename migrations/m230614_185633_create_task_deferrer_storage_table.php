<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_deferrer_storage}}`.
 */
class m230614_185633_create_task_deferrer_storage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task_deferrer_storage}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task_deferrer_storage}}');
    }
}
