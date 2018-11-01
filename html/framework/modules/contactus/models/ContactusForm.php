<?php

namespace app\modules\contactus\models;

use krok\storage\dto\UploaderDto;
use Yii;

/**
 * This is the model class for table "{{%contactus}}".
 *
 * @property string $name
 * @property string $contacts
 * @property string $message
 * @property string $country
 * @property string $city
 */
class ContactusForm extends \yii\base\Model
{
    public $name;
    public $contacts;
    public $message;
    public $country;
    public $city;
    public $file;

    /**
     * @var Contactus
     */
    protected $contactus;

    /**
     * @var Notifications[]
     */
    protected $notifications;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'contacts'], 'required'],
            [['contacts', 'message'], 'string'],
            [['file'], 'file'],
            [['name', 'country', 'city'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'contacts' => 'Contacts',
            'message' => 'Message',
            'country' => 'Country',
            'city' => 'City',
            'file' => 'File',
        ];
    }

    /**
     * @param Contactus $model
     */
    public function setContactus(Contactus $model)
    {
        $this->contactus = $model;
    }

    /**
     * @param array $notifications
     */
    public function setNotifications(array $notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * @return bool
     */
    public function save()
    {
        if (!$this->validate()) {
            return false;
        }
        $this->contactus->name = $this->name;
        $this->contactus->contacts = $this->contacts;
        $this->contactus->message = $this->message;
        $this->contactus->country = $this->country;
        $this->contactus->city = $this->city;
        $this->contactus->file = $this->file;

        return $this->contactus->save();
    }

    public function notifications()
    {
        $message = Yii::$app->mailer->compose('@app/modules/contactus/mail/form', [
            'contactus' => $this->contactus,
        ]);
        foreach ($this->notifications as $item) {
            $message
                ->setFrom(Yii::$app->params['email'])
                ->setTo($item->email)
                ->setSubject('Сообщение с сайта ЭНСАЙН');
            if ($this->contactus->file && $this->contactus->file instanceof UploaderDto) {
                $message->attach(Yii::getAlias('@public') . '/storage/' . $this->contactus->file->getSrc());
            } elseif ($this->contactus->file) {
                $message->attach(Yii::getAlias('@public') . '/storage/' . $this->contactus->file);

            }

            $message->send();
        }
    }
}
