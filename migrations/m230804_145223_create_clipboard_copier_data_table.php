<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clipboard_copier_data}}`.
 */
class m230804_145223_create_clipboard_copier_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clipboard_copier_data}}', [
            'id' => $this->primaryKey(),
            'storage_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'value' => $this->string()->notNull(),
        ]);

        $this->addForeignKey(
            '{{%fk_clipboard_copier_data_storage_id}}',
            '{{%clipboard_copier_data}}',
            'storage_id',
            '{{%clipboard_copier_storage}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clipboard_copier_data}}');
    }
}
