<?php

use yii\db\Migration;

/**
 * Class m180226_073913_file
 */
class m180226_073913_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contactus}}', 'file', $this->string(64)->null()->defaultValue(null)->after('[[message]]'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%contactus}}', 'file');
    }
}
