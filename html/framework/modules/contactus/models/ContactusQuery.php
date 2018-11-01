<?php

namespace app\modules\contactus\models;

/**
 * This is the ActiveQuery class for [[Contactus]].
 *
 * @see Contactus
 */
class ContactusQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return Contactus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Contactus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
