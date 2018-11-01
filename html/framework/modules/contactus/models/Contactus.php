<?php

namespace app\modules\contactus\models;

use krok\extend\behaviors\TimestampBehavior;
use krok\storage\behaviors\UploaderBehavior;
use krok\storage\dto\UploaderDto;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%contactus}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $contacts
 * @property string $message
 * @property UploaderDto|string $file
 * @property string $country
 * @property string $city
 * @property string $createdAt
 * @property string $updatedAt
 */
class Contactus extends \yii\db\ActiveRecord
{
    const FILE_YES = 1;
    const FILE_NO = 0;
    const FILE_UNDEFINED = 2;

    public $hasFile;

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
            'UploaderBehavior' => [
                'class' => UploaderBehavior::class,
                'attribute' => 'file',
                'scenarios' => [
                    self::SCENARIO_DEFAULT,
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contactus}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'contacts'], 'required'],
            [['contacts', 'message'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['name', 'country', 'city'], 'string', 'max' => 128],
            [['file'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'contacts' => 'Контакты',
            'message' => 'Сообщение',
            'file' => 'Файл',
            'country' => 'Страна',
            'city' => 'Город',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата обновления',
            'hasFile' => 'Файл загружен',
        ];
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return ArrayHelper::getValue(static::getFileList(),
            $this->file->getSrc() == '/storage/' ? self::FILE_NO : self::FILE_YES);
    }

    /**
     * @return array
     */
    public static function getFileList()
    {
        return [
            self::FILE_YES => 'Есть',
            self::FILE_NO => 'Нет',
        ];
    }

    /**
     * @return int
     */
    public function hasFile()
    {
        return $this->file->getSrc() == '/storage/' ? self::FILE_NO : self::FILE_YES;
    }

    /**
     * @inheritdoc
     * @return ContactusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactusQuery(get_called_class());
    }
}
