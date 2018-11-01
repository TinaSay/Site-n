<?php

namespace app\modules\contactus\models;

use krok\extend\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%notifications}}".
 *
 * @property integer $id
 * @property string $email
 * @property integer $banned
 * @property string $createdAt
 * @property string $updatedAt
 */
class Notifications extends \yii\db\ActiveRecord
{
    const BANNED_YES = 1;
    const BANNED_NO = 0;

    /**
     * @return array
     */
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'TimestampBehavior' => [
                'class' => TimestampBehavior::class,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%notifications}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['email'], 'email'],
            [['banned'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'banned' => 'Заблокировано',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата обновления',
        ];
    }

    /**
     * @return mixed
     */
    public function getBanned()
    {
        return ArrayHelper::getValue(static::getBannedList(), $this->banned);
    }

    /**
     * @return array
     */
    public static function getBannedList()
    {
        return [
            self::BANNED_NO => 'Нет',
            self::BANNED_YES => 'Да',
        ];
    }

    /**
     * @inheritdoc
     * @return NotificationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotificationsQuery(get_called_class());
    }
}
