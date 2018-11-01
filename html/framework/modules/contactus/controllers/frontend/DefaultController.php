<?php

namespace app\modules\contactus\controllers\frontend;

use app\modules\contactus\models\Contactus;
use app\modules\contactus\models\ContactusForm;
use app\modules\contactus\models\Notifications;
use krok\system\components\frontend\Controller;
use Yii;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Class DefaultController
 *
 * @package app\modules\contactus\controllers\frontend
 */
class DefaultController extends Controller
{
    /**
     * @return array
     */
    public function actionIndex()
    {
        Yii::$app->getResponse()->format = Response::FORMAT_JSON;

        $model = new ContactusForm();

        $model->setContactus(new Contactus());
        $model->setNotifications(Notifications::find()->where(['banned' => Notifications::BANNED_NO])->all());

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->save()) {
                $model->notifications();

                return ['success' => true, 'errors' => $model->getErrors()];
            }
        }

        return ['success' => false];
    }
}
