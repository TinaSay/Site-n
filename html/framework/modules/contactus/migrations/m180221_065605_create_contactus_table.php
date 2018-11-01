<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contactus`.
 */
class m180221_065605_create_contactus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = ($this->db->getDriverName() === 'mysql') ? 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci' : null;

        $this->createTable('{{%contactus}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'contacts' => $this->text()->notNull(),
            'message' => $this->text(),
            'country' => $this->string(128),
            'city' => $this->string(128),
            'createdAt' => $this->dateTime()->null()->defaultValue(null),
            'updatedAt' => $this->dateTime()->null()->defaultValue(null),
        ], $options);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contactus}}');
    }
}
