<?php

use yii\db\Migration;

/**
 * Handles the creation of table `notifications`.
 */
class m180221_102421_create_notifications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = ($this->db->getDriverName() === 'mysql') ? 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci' : null;

        $this->createTable('{{%notifications}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(128),
            'banned' => $this->tinyInteger(),
            'createdAt' => $this->dateTime()->null()->defaultValue(null),
            'updatedAt' => $this->dateTime()->null()->defaultValue(null),
        ], $options);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notifications}}');
    }
}
