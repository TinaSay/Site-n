<?php

namespace app\modules\contactus\widgets;

use app\modules\contactus\models\ContactusForm;
use yii\base\Widget;

/**
 * Class ContactusWidget
 *
 * @package app\modules\contactus\widgets
 */
class ContactusWidget extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        $model = new ContactusForm();

        return $this->render('form', [
            'model' => $model,
        ]);
    }
}
