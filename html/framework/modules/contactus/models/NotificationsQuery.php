<?php

namespace app\modules\contactus\models;

/**
 * This is the ActiveQuery class for [[Notifications]].
 *
 * @see Notifications
 */
class NotificationsQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return Notifications[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Notifications|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
