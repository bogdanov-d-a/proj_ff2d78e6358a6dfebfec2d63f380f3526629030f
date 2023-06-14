<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_deferrer_data}}`.
 */
class m230614_190227_create_task_deferrer_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task_deferrer_data}}', [
            'id' => $this->primaryKey(),
            'storage_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'date' => $this->date()->notNull(),
            'defer_days' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            '{{%fk_task_deferrer_data_storage_id}}',
            '{{%task_deferrer_data}}',
            'storage_id',
            '{{%task_deferrer_storage}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task_deferrer_data}}');
    }
}
