<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clipboard_copier_storage}}`.
 */
class m230804_145219_create_clipboard_copier_storage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clipboard_copier_storage}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clipboard_copier_storage}}');
    }
}
