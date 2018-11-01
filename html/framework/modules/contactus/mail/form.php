<?php
/**
 * Created by PhpStorm.
 * User: nsign
 * Date: 25.02.18
 * Time: 15:50
 */

/** @var $contactus \app\modules\contactus\models\Contactus */

use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */

?>
<h3>Здравствуйте!</h3>
<p><?= Yii::$app->getFormatter()->asDatetime(new DateTime('now')) ?> на сайте <a href="http://www.nsign.ru"
                                                                                 target="_blank"> www.nsign.ru </a> было
    оставлено сообщение: </p>
<p>ФИО/Название организации: <?= $contactus->name ?></p>
<p>Контактная информация: <?= $contactus->contacts ?> </p>
<p>Страна: <?= $contactus->country ?></p>
<p>Город: <?= $contactus->city ?></p>

<p>Сообщение:
    <?= Html::encode($contactus->message) ?></p>

<p>С уважением,
    почтовый робот N.</p>